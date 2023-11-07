<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
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
        'parroco',
    ];

    public function scopeFilter(Builder $q,  $request)
    {

        return $q
                ->when($request->num,function(Builder $q) use ($request){
                    $q->where('num',$request['num']);
                })
                ->when($request->num_folio,function(Builder $q) use ($request){
                    $q->where('num_folio',$request['num_folio']);
                })
                ->when($request->num_libro,function(Builder $q) use ($request){
                    $q->where('num_libro',$request['num_libro']);
                })
                ->when($request->birth,function(Builder $q) use ($request){
                    $q->whereDate('birth',$request['birth']);
                })
                ->when($request->date,function(Builder $q) use ($request){
                    $q->whereDate('date',$request['date']);
                })
                ->when($request->ci_child,function(Builder $q) use ($request){
                    $q->where('ci_child',$request['ci_child']);
                })
                ->when($request->ci_mother,function(Builder $q) use ($request){
                    $q->where('ci_mother',$request['ci_mother']);
                })
                ->when($request->ci_father,function(Builder $q) use ($request){
                    $q->where('ci_father',$request['ci_father']);
                })
                ->when($request->ci,function(Builder $q,$ci){
                    $q->orWhere('ci_father','like','%'.$ci.'%')
                        ->orWhere('ci_mother','like','%'.$ci.'%')
                        ->orWhere('ci_child','like','%'.$ci.'%')
                        ->orWhere('ci_godparents_1','like','%'.$ci.'%')
                        ->orWhere('ci_godparents_2','like','%'.$ci.'%')
                        ;
                })
                ->when($request->child,function(Builder $q) use ($request){
                    // dd('asd');
                    $q->where('child','like', '%'.$request['child'] . '%');
                })
                ->when($request->ci_godparents_1,function(Builder $q) use ($request){
                    $q->where('ci_godparents_1','like','%'. $request['ci_godparents_1'] .'%' )
                        ->orwhere('ci_godparents_2','like','%'. $request['ci_godparents_1'] .'%' )
                        ;
                })
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
