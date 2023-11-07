@extends('reports.base')

@section('style')
    <style>
        .border-page {
            width: 100%;
            height: 90%;
            border: 1px solid black
        }
        .border {
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
            <div style="height: 10%">
                <table style="width: 100%; padding-bottom:30px">
                    <tr>
                        <td style="width:30%">
                            @if ($setting->left_logo)
                                <img width="150px" src="{{ asset($setting->left_logo) }}" />
                            @endif
                        </td>
                        <td align="center" style="width:40%">
                            <div align="center" style="text-align: center">
                                <h4 align='center'>
                                    {!! str_replace("\n", '<br>', $setting->header) !!}
                                </h4>
                                <br>
                                <h3 align='center'>
                                    <u>Certificado de Confirmación</u>
                                </h3>
                            </div>
                        </td>
                        <td style="width:30%">
                            @if ($setting->right_logo)
                                <img width="150px" src="{{ asset($setting->right_logo) }}" />
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="" style="height: 50%">
                <table class=""  style="font-size: 18px;">
                    <tr>
                        <td style="border: 1px solid black; width: 30%;" align="center">
                            <div align="left">
                                Archivo Parroquial
                            </div>
                            <div>
                                Libro: <span>{{ $document->num_libro }}</span><br>
                                Folio: <span>{{ $document->num_folio }}</span><br>
                                Nro: <span>{{ $document->num }}</span><br>
                            </div>
                            <br>
                            <div>
                                <div>Notas Marginales</div>
                                <span style="font-size: 14px">{{ $document->observation }}</span>
                            </div>
                            <br>

                            <div>
                                <div align="center">
                                    Visado
                                </div>
                                <div>
                                    Curia Diocesana de Valle de La Pascua
                                </div>
                                <div>
                                    <br>
                                    <br>
                                    Se Reconoce la firma y el sello
                                    <br>
                                    <br>
                                </div>
                                {{-- <div align="center"> --}}
                                    <hr align="center" style="width: 70%">
                                    <div align="center">Es Auténtico</div>
                                {{-- </div> --}}
                                <div align="left">
                                    fecha: <span style="margin: 0 15px"> &nbsp; &nbsp; &nbsp;/ &nbsp; &nbsp; </span><span style="margin: 0 15px">&nbsp; &nbsp; / </span> <br>
                                    firma: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>
                                    sello: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>
                                </div>
                            </div>
                        </td>
                        <td style=" width: 70%; padding: 0px 20px">
                            <p>
                                Quien suscribe Pbro.: <br><span><b> {{ $document->parroco }}</b></span> cura,<br> Párroco de esta
                                comunidad certifica que:
                            </p>
                            <p>
                                <span><b>{{ $document->child }}</b></span> hijo(a) de:<br>
                                <span><b>{{ $document->mother }}</b></span> y de <span><b>{{ $document->father }}</b></span>
                            </p>
                            <p>
                                Fue solemnemente confirmado(a) por: <br><span><b>{{ $document->by_priets }}</b></span><br> el día
                                <span><b>{{ $date->day }}</b></span> del mes
                                <span><b>{{ $date->locale('es')->monthName }}</b></span> del
                                <span><b>{{ $date->year }}</b></span>
                            </p>
                            <p>
                                Siendo sus padrinos: <span><b>{{ $document->godparents_1 }}</b></span> y
                                <span><b>{{ $document->godparents_2 }}</b></span>.
                            </p>
                            <p>
                                En Altagracia de Orituco el <span><b>{{ $created->day }}</b></span> de
                                <span><b>{{ $created->locale('es')->monthName }}</b></span> del año
                                <span><b>{{ $created->year }}</b></span>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>

            <div  style="margin-top: 50px; height: 10%;">
                <div align='center'>
                    @if ($setting->digital_firm)
                        <img src="{{ asset($setting->digital_firm) }}" width="300px" />
                    @endif
                    <hr style="width: 300px">
                    <p align='center'>Firma y Sello de la Parroquia</p>
                </div>
                <div  >
                    <small>Atención: si este certificado va a ser presentado fuera del territorio diocesano debe ser visado en
                        la Curia Diocesana a efectos de su validez</small>
                </div>
            </div>
        </div>
    </div>
@endsection
