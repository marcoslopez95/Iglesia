<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class MatrimonioView extends Component
{
    use WithPagination;
    public $headers = [
        [
            'title' => 'Núm.',
            'value' => 'num'
        ],
        [
            'title' => 'Núm. Folio',
            'value' => 'num_folio'
        ],
        [
            'title' => 'Núm. Libro',
            'value' => 'num_libro'
        ],
        [
            'title' => 'Fecha',
            'value' => 'date'
        ],
        [
            'title' => 'Esposa',
            'value' => 'mother'
        ],
        [
            'title' => 'Esposo',
            'value' => 'father'
        ],
        [
            'title' => 'Acciones',
            'value' => ''
        ],
    ];

    public $filter = [
        'num' => '',
        'num_folio' => '',
        'num_libro' => '',
        'birth' => '',
        'date' => '',
        'ci_child' => '',
        'ci_mother' => '',
        'ci_father' => '',
        'ci_godparents_1' => '',
        'ci_godparents_2' => '',
    ];

    public function search()
    {
        $this->resetPage();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.matrimonio-view',[
            'documents' => Document::filter($this->filter)->onlyMatrimonios()->paginate(15)
        ]);
    }
    public function download(int $id)
    {
        $document = Document::find($id);
        if(!$document) return;

    }

    public function delete(int $id)
    {
        $document = Document::find($id);
        if(!$document) return;
        $document->delete();
        $this->resetPage();
    }
}
