<?php

namespace App\Livewire\Traits;

use App\Models\Document;
use App\Models\Setting;

trait DocumentTrait {
    public $num_libro = '';
    public $num_folio = '';
    public $num = '';
    public function saveDocument(array $validated, int $type_document)
    {
        $validated = array_merge([
            'document_type_id' => $type_document,
            'by_priets' => (Setting::first())->parroco,
        ],$validated);

        Document::create($validated);

    }

    public function updateDocument(array $validated, int $id)
    {
        $document = Document::find($id);
        $document->update($validated);

    }
}
