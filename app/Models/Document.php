<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_type_id',
        'by_priets',

        'child',
        'mother',
        'father',
        'place_birth',
        'birth',
        'date',
        'godparents_1',
        'godparents_2',
        'ending',
        'num_libro',
        'num_folio',
        'num',
    ];

    public function scopeOnlyBautismos(Builder $q)
    {
        return $q->where('document_type_id', DocumentType::BAUTISMO);
    }

    public function scopeOnlyMatrimonios(Builder $q)
    {
        return $q->where('document_type_id', DocumentType::MATRIMONIO);
    }

    public function scopeOnlyConfirmaciones(Builder $q)
    {
        return $q->where('document_type_id', DocumentType::CONFIRMACION);
    }
}
