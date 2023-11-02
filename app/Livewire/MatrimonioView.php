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
            'value' => 'num'
        ],
        [
            'title' => 'Titular',
            'value' => 'child'
        ],
        [
            'title' => 'Acciones',
            'value' => ''
        ],
    ];


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.matrimonio-view',[
            'documents' => Document::onlyMatrimonios()->paginate(15)
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
