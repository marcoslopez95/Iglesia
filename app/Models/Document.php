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
        'observation',

        'num_libro',
        'num_folio',
        'num',

        'ci_child',
        'ci_mother',
        'ci_father',
        'ci_godparents_1',
        'ci_godparents_2',
    ];

    public function scopeFilter(Builder $q, $request)
    {
        return $q
                ->when($request['num'],fn(Builder $q,$num) => $q->where('num',$num))
                ->when($request['num_folio'],fn(Builder $q,$num_folio) => $q->where('num_folio',$num_folio))
                ->when($request['num_libro'],fn(Builder $q,$num_libro) => $q->where('num_libro',$num_libro))
                ->when($request['birth'],fn(Builder $q,$birth) => $q->where('birth',$birth))
                ->when($request['date'],fn(Builder $q,$date) => $q->where('date',$date))
                ->when($request['ci_child'],fn(Builder $q,$ci_child) => $q->where('ci_child',$ci_child))
                ->when($request['ci_mother'],fn(Builder $q,$ci_mother) => $q->where('ci_mother',$ci_mother))
                ->when($request['ci_father'],fn(Builder $q,$ci_father) => $q->where('ci_father',$ci_father))
                ->when($request['ci_godparents_1'],fn(Builder $q,$ci_godparents_1) => $q->where('date',$ci_godparents_1))
                ->when($request['ci_godparents_2'],fn(Builder $q,$ci_godparents_2) => $q->where('ci_godparents_2',$ci_godparents_2))
                ;
    }

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
