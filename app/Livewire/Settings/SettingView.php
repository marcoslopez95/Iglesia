<?php

namespace App\Livewire\Settings;

use App\Models\Setting;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SettingView extends Component
{
    use WithFileUploads;
    public $header = '';
    #[Rule('image|max:1024')]
    public $logo_left;

    #[Rule('image|max:1024')]
    public $logo_right;

    #[Rule('image|max:1024')]
    public $digital_firm;
    public $parroco = '';
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.settings.setting-view');
    }

    public function mount(): void
    {
        $setting = Setting::first();
        if(!$setting) return;
        $this->header       = $setting->header;
        $this->logo_left    = $setting->left_logo;
        $this->logo_right   = $setting->right_logo;
        $this->digital_firm = $setting->digital_firm;
        $this->parroco      = $setting->parroco;
    }

    public function updateSettings():void
    {
        $setting = Setting::first();
        $validated = $this->validate([
            'header' => 'required|string',
            'parroco' => 'required|string',
            'logo_left' => 'nullable',
            'logo_right' => 'nullable',
            'digital_firm' => 'nullable',
        ]);
        // dump($this->logo_left instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile);
        // dd( gettype($this->logo_right));

        if($this->isFile($this->logo_left)){
            // dd('asd');
            $ext = $this->logo_left->getClientOriginalExtension();
            $name = uuid_create().'.'.$ext;
            $pathLogoLeft = $this->logo_left->storeAs('/public/settings',$name);
            unset($validated['logo_left']);
            $validated = array_merge(['left_logo' =>  $pathLogoLeft],$validated);
        }
        if($this->isFile($this->logo_right)){
            $ext = $this->logo_right->getClientOriginalExtension();
            $name = uuid_create().'.'.$ext;
            $pathLogoRight = $this->logo_right->storeAs('/public/settings',$name);
            unset($validated['logo_right']);
            $validated = array_merge(['right_logo' => $pathLogoRight],$validated);
        }
        if($this->isFile($this->digital_firm)){
            $ext = $this->digital_firm->getClientOriginalExtension();
            $name = uuid_create().'.'.$ext;
            $pathDigitalFirm = $this->digital_firm->storeAs('/public/settings',$name);
            unset($validated['digital_firm']);
            $validated = array_merge(['digital_firm' => $pathDigitalFirm],$validated);
        }
        // dd($validated);

        if(!$setting){
            $setting = Setting::create($validated);
        }else{
            $setting->update($validated);
        }
        Log::info($validated);
        $this->dispatch('setting-updated');
    }

    private function isFile($file):bool
    {
        return $file instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
    }
}
