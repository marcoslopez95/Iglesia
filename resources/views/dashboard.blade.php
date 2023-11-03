<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $confirmaciones = \App\Models\Document::onlyConfirmaciones()->get();
                        $bautizos = \App\Models\Document::onlyBautismos()->get();
                        $matrimonios = \App\Models\Document::onlyMatrimonios()->get();
                    @endphp
                    <div>
                        <div>
                            <b>Confirmaciones:</b> {{$confirmaciones->count()}}
                        </div>
                        <div>
                            <b>Bautizos:</b> {{$bautizos->count()}}
                        </div>
                        <div>
                            <b>Matrimonios:</b> {{$matrimonios->count()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
