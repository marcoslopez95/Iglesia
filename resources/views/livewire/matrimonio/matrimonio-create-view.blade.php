    {{-- Because she competes with no one, no one can compete with her. --}}

    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Matrimonios - Crear
            </h2>
            <div>
                <x-btn-secondary href="{{ route('matrimonios') }}" >
                    Atrás
                </x-btn-secondary>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                Información General
                            </h2>
                        </header>

                        <form wire:submit="save" class="mt-6 space-y-6">
                            <div class="grid grid-cols-2 gap-10">
                                <div>
                                    <x-input-label for="father" value="Nombre del esposo" />
                                    <x-text-input wire:model="father" id="father" name="father" type="text"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('father')" />
                                </div>
                                <div>
                                    <x-input-label for="ci_father" value="Cédula del esposo" />
                                    <x-text-input wire:model="ci_father" id="ci_father" name="ci_father" type="text"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('ci_father')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-10">
                                <div>
                                    <x-input-label for="mother" value="Nombre del esposa" />
                                    <x-text-input wire:model="mother" id="mother" name="mother" type="text"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('mother')" />
                                </div>
                                <div>
                                    <x-input-label for="ci_mother" value="Cédula de la esposa " />
                                    <x-text-input wire:model="ci_mother" id="ci_mother" name="ci_mother" type="text"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('ci_mother')" />
                                </div>
                            </div>
                            <hr>
                            <div class="grid grid-cols-2 gap-10">
                                <div>
                                    <x-input-label for="date" value="Fecha de Matrimonio Canónico" />
                                    <x-text-input wire:model="date" id="date" name="date" type="date"
                                        class="mt-1 block w-full"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('date')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-10">
                                <div>
                                    <x-input-label for="godparents_1" value="Testigo 1" />
                                    <x-text-input wire:model="godparents_1" id="godparents_1" name="godparents_1" type="text"
                                        class="mt-1 block w-full"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('godparents_1')" />
                                </div>
                                <div>
                                    <x-input-label for="ci_godparents_1" value="Cédula Testigo 1" />
                                    <x-text-input wire:model="ci_godparents_1" id="ci_godparents_1" name="ci_godparents_1" type="text"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('ci_godparents_1')" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-10">
                                <div>
                                    <x-input-label for="godparents_2" value="Testigo 2" />
                                    <x-text-input wire:model="godparents_2" id="godparents_2" name="godparents_2" type="text"
                                        class="mt-1 block w-full"/>
                                    <x-input-error class="mt-2" :messages="$errors->get('godparents_2')" />
                                </div>
                                <div>
                                    <x-input-label for="ci_godparents_2" value="Cédula Testigo 2" />
                                    <x-text-input wire:model="ci_godparents_2" id="ci_godparents_2" name="ci_godparents_2" type="text"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('ci_godparents_2')" />
                                </div>
                            </div>
                            <hr>
                            <div class="grid grid-cols-1 gap-10">
                                <div>
                                    <x-input-label for="observation" value="Observaciones" />
                                    <x-text-tarea wire:model="observation" id="observation" name="observation"
                                        class="mt-1 block w-full" autofocus autocomplete="Nombre Completo..." />
                                    <x-input-error class="mt-2" :messages="$errors->get('observation')" />
                                </div>
                            </div>
                            @include('livewire.numsComponent')
                            <div class="flex items-center gap-4">
                                <x-primary-button>
                                    Guardar
                                </x-primary-button>

                                <x-action-message class="mr-3" on="setting-updated">
                                    Guardado.
                                </x-action-message>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
