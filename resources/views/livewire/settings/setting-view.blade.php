{{-- <x-app-layout> --}}
{{-- If your happiness depends on money, you will never be happy with yourself. --}}
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Configuraciones
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            Información General
                        </h2>

                        {{-- <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your account's profile information and email address.") }}
                            </p> --}}
                    </header>

                    <form wire:submit="updateSettings" class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="parroquia" value="Parroquia" />
                            <x-text-input wire:model="parroquia" id="parroquia" name="parroquia" type="text"
                                class="mt-1 block w-full" required autofocus autocomplete="Nombre Completo..." />
                            <x-input-error class="mt-2" :messages="$errors->get('parroquia')" />
                        </div>
                        <div>
                            <x-input-label for="diosesis" value="Diosesis" />
                            <x-text-input wire:model="diosesis" id="diosesis" name="diosesis" type="text"
                                class="mt-1 block w-full" required autofocus autocomplete="Nombre Completo..." />
                            <x-input-error class="mt-2" :messages="$errors->get('diosesis')" />
                        </div>
                        <div>
                            <x-input-label for="parroco" value="Prebistero" />
                            <x-text-input wire:model="parroco" id="parroco" name="parroco" type="text"
                                class="mt-1 block w-full" required autofocus autocomplete="Nombre Completo..." />
                            <x-input-error class="mt-2" :messages="$errors->get('parroco')" />
                        </div>
                        <div>
                            <x-input-label for="header" value="Cabecera de Documentos" />
                            <p class="mt-1 text-sm text-gray-600">
                                La cabecera saldrá centrada
                            </p>
                            {{-- <x-text-input wire:model="headerText" id="headerText" name="headerText" type="text" class="mt-1 block w-full" required autofocus autocomplete="Nombre Completo..." /> --}}
                            <x-text-tarea wire:model="header" id="header" name="header" type="text"
                                class="mt-1 block w-full" required autofocus
                                autocomplete="Nombre Completo..."></x-text-tarea>
                            <x-input-error class="mt-2" :messages="$errors->get('header')" />
                        </div>
                        <div class="flex ">

                            <div class="w-1/2">
                                <x-input-label for="logo_left" value="Logo Izquierdo" />
                                {{-- <x-text-input wire:model="headerText" id="headerText" name="headerText" type="text" class="mt-1 block w-full" required autofocus autocomplete="Nombre Completo..." /> --}}
                                <x-text-input type="file" wire:model="logo_left" id="logo_left" name="logo_left"
                                    class="mt-1 block w-full" ></x-text-input>
                                <x-input-error class="mt-2" :messages="$errors->get('logo_left')" />
                            </div>
                            @if ($logo_left)
                                <div>
                                    <img src="{{ (gettype($logo_left) == 'string') ? $logo_left : $logo_left->temporaryUrl() }}" style="height: 150px; width: 150px">
                                </div>
                            @endif
                        </div>
                        <div class="flex ">
                            <div class="w-1/2">
                                <x-input-label for="logo_right" value="Logo Derecho" />
                                <x-text-input wire:model="logo_right" id="logo_right" name="logo_right" type="file" class="mt-1 block w-full"  />
                                <x-input-error class="mt-2" :messages="$errors->get('logo_right')" />
                            </div>
                            @if ($logo_right)
                                <div>
                                    <img src="{{ (gettype($logo_right) == 'string') ? $logo_right : $logo_right->temporaryUrl()  }}" style="height: 150px; width: 150px">
                                </div>
                            @endif
                        </div>
                        <div class="flex ">
                            <div class="w-1/2">
                                <x-input-label for="digital_firm" value="Firma Digital" />
                                <x-text-input wire:model="digital_firm" id="digital_firm" name="digital_firm" type="file" class="mt-1 block w-full" />

                                <x-input-error class="mt-2" :messages="$errors->get('digital_firm')" />
                            </div>
                            @if ($digital_firm)
                                <div>
                                    <img src="{{ (gettype($digital_firm) == 'string') ? $digital_firm : $digital_firm->temporaryUrl() }}" style="height: 150px; width: 150px">
                                </div>
                            @endif
                        </div>


                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>

                            <x-action-message class="mr-3" on="setting-updated">
                                {{ __('Saved.') }}
                            </x-action-message>
                        </div>
                    </form>
                </section>

            </div>
        </div>
    </div>
</div>
{{-- </x-app-layout> --}}
