<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Attributes\Layout;
use Livewire\Component;

class BautismoView extends Component
{
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
        return view('livewire.bautismo-view',[
            'documents' => Document::OnlyBautismos()->paginate(15)
        ]);
    }
    public function download()
    {
        return response()->download(
            $this->invoice->file_path, 'invoice.pdf'
        );
    }
}
