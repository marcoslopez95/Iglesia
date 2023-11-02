<?php

namespace App\Livewire\Confirmacion;

use App\Livewire\Traits\DocumentTrait;
use App\Models\Document;
use App\Models\DocumentType;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateView extends Component
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
    public $id;
    public $observation;

    public function mount()
    {
        if(request()->confirmacion_id){
            $this->id = request()->confirmacion_id  ;
            $document = Document::find(request()->confirmacion_id);
            $this->child = $document->child;
            $this->mother = $document->mother;
            $this->father = $document->father;
            $this->place_birth = $document->place_birth;
            $this->birth = $document->birth;
            $this->date = $document->date;
            $this->godparents_1 = $document->godparents_1;
            $this->godparents_2 = $document->godparents_2;
            $this->ending = $document->ending;
            $this->num_libro = $document->num_libro;
            $this->num_folio = $document->num_folio;
            $this->num = $document->num;
            $this->observation = $document->observation;
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.confirmacion.confirmacion-create-view');
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
            'observation' => 'nullable|string',
        ]);

        if($this->id){
            $this->updateDocument($validated, $this->id);
        }else{
            $this->saveDocument($validated,DocumentType::CONFIRMACION);
        }

        $this->redirect(route('confirmaciones'));

    }
}
