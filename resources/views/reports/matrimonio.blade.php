@extends('reports.base')

@section('style')
    <style>
        .border-page {
            width: 100%;
            height: 90%;
            border: 1px solid black
        }

        .pa-5 {
            padding: 10px
        }

        span {
            font-weight: 700;
            font-size: 1.2rem;
            font-style: italic;
        }

        @page {
            margin-top: 25px;
            margin-bottom: 25px;
            margin-left: 25px;
            margin-right: 25px
        }
    </style>
@endsection

@section('content')
    <div class="border-page pa-5">
        <div class="border-page pa-5">
            <h3 align='center'>
                Certificado de Matrimonio
            </h3>
            <div align='center' style="display: flex;justify-content: center">
                <img src="{{ asset($setting->left_logo) }}" width="150px" height="150px" />
            </div>
            <div align='center'>
                Parroquia de <span>{{ $setting->parroquia }}</span><br>
                Diosesis de <span>{{ $setting->diosesis }}</span>
            </div>
            <div>
                <h2 align='center'>
                    CERTIFICADO
                </h2>
            </div>
            <div align="center" style="padding: 0px 20px">
                <p>
                    De que <span>{{ $document->mother }}</span> y <span>{{ $document->father }}</span>. Previo el Matrimonio
                    Civil contrajeron
                    Matrimonio Canónico el día <span>{{ $date->day }}</span> de
                    <span>{{ $date->locale('es')->monthName }}</span> de <span>{{ $date->year }}</span>
                </p>
                <p>
                    De acuerdo con el Rito de la Iglesia Católica Romana Oficiando el Rvdo.
                    <span>{{ $document->parroco }}</span>
                </p>
                <p>
                    En presencia de los Testigos <span>{{ $document->godparents_1 }}</span> y
                    <span>{{ $document->godparents_2 }}</span>
                </p>
                <p>
                    Como aparece en el Registro Principal de Matrimonios Libro <span>{{ $document->num_libro }}</span>,
                    folio <span>{{ $document->num_folio }}</span>
                </p>
                <p>
                    Fecha de expedición: <span>{{ $created->day }}</span> de <span>
                        {{ $created->locale('es')->monthName }} </span> de <span>{{ $created->year }}</span>
                </p>
            </div>
            <div
                style="margin-top: 50px;display: flex;justify-content: center; align-content: flex-end">
                <div align='center'>
                    @if ($setting->digital_firm)
                        <img src="{{ asset($setting->digital_firm) }}" width="300px" />
                    @endif
                    <hr style="width: 300px">
                    <p align='center'>Firma y Sello de la Parroquia</p>
                </div>
            </div>
        </div>
    </div>
@endsection
