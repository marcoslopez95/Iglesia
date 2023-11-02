@extends('reports.base')

@section('style')
    <style>
        .border-page {
            width: 100%;
            height: 100%;
            border: 1px solid black
        }

        .pa-5 {
            padding: 10px
        }

        span{
            font-weight: 600;
            font-size: 1.2rem;
            font-style: italic
        }
    </style>
@endsection

@section('content')
    <div class="border-page pa-5">
        <div class="border-page">
            <h3 align='center'>
                Certificado de Matrimonio
            </h3>
            <div style="display: flex;justify-content: center">
                <img src="{{ asset($setting->left_logo) }}" width="150px" height="150px" />
            </div>
            <div align="center">
                <p>Parroquia de <span >{{ $setting->parroquia }}</span></p>
                <p>Diosesis de <span >{{ $setting->diosesis }}</span></p>
            </div>
            <div align="center">
                <h2>
                    CERTIFICADO
                </h2>
            </div>
            <div align="center">
                <p>
                    De que <span >{{ $document->mother }}</span> y <span
                        >{{ $document->father }}</span>. Previo el Matrimonio Civil contrajeron
                    Matrimonio Canónico el día <span >{{ $date->day }}</span> de <span >{{ $date->locale('es')->monthName}}</span> de <span >{{ $date->year }}</span>
                </p>
                <p>
                    De acuerdo con el Rito de la Iglesia Católica Romana Oficiando el Rvdo. <span>{{ $setting->parroco }}</span>
                </p>
                <p>
                    En presencia de los Testigos <span>{{ $document->godparents_1 }}</span> y <span>{{ $document->godparents_2 }}</span>
                </p>
                <p>
                    Como aparece en el Registro Principal de Matrimonios Libro <span>{{ $document->num_libro }}</span>, folio <span>{{ $document->num_folio }}</span>
                </p>
                <p>
                    Fecha de expedición: <span>{{ $created->day }}</span> de <span> {{ $created->locale('es')->monthName }} </span> de <span>{{ $created->year }}</span>
                </p>
            </div>
            <div style="margin-top: 50px;display: flex; height: 100%; width: 100%; justify-content: center; align-content: flex-end">
                <div align='center'>
                    @if ($setting->digital_firm)
                        <img src="{{ asset( $setting->digital_firm) }}" width="300px" />
                    @endif
                    <hr style="width: 300px">
                    <p>Firma y Sello de la Parroquia</p>
                </div>
            </div>
        </div>
    </div>
@endsection
