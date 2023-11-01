<?php

namespace App\Livewire\Bautismo;

use App\Livewire\Traits\DocumentTrait;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BautismoCreateView extends Component
{
    use DocumentTrait;

    public $child;
    public $mother;
    public $father;
    public $place_birth;
    public $birth;
    public $date;
    public $godparents_1;
    public $godparents_2;
    public $ending;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.bautismo.bautismo-create-view');
    }

    public function save()
    {
        $validated = $this->validate([
            'child' => 'required|string',
            'mother' => 'nullable|string',
            'father' => 'nullable|string',
            'place_birth' => 'nullable|string',
            'birth' => 'nullable|date',
            'date' => 'nullable|date',
            'godparents_1' => 'nullable|string',
            'godparents_2' => 'nullable|string',
            'ending' => 'nullable|string',
            'num_libro' => 'required|string',
            'num_folio' => 'required|string',
            'num' => 'required|string',
        ]);

        $this->saveDocument($validated,DocumentType::BAUTISMO);

        $this->redirect(route('bautismos'));

    }
}
