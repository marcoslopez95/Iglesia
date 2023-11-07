@push('scripts')
<script>
    var open = false
    function toggleModal(){
        const modal = document.querySelector('#modal')
        modal.classList.toggle( !open ? 'hidden' : 'opacity-0')
        const interval = setInterval(() => {
            modal.classList.toggle(open ? 'hidden' : 'opacity-0')
            open = !open
            clearInterval(interval)
        }, 100);
        // modal.classList.toggle('z-10')
        // modal.classList.toggle('opacity-100')
    }
    // toggleModal()
</script>

@endpush

<div x-data="{ open: false }">

    <x-btn-primary @click="toggleModal()" type="button" class="mx-3">
        Filtrar
    </x-btn-primary>
    <div id="modal"
        class="relative ease-out duration-300  hidden opacity-0"
        aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!--
      Background backdrop, show/hide based on modal state.

      Entering: "ease-out duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "ease-in duration-200"
        From: "opacity-100"
        To: "opacity-0"
    -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <!--
          Modal panel, show/hide based on modal state.

          Entering: "ease-out duration-300"
            From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            To: "opacity-100 translate-y-0 sm:scale-100"
          Leaving: "ease-in duration-200"
            From: "opacity-100 translate-y-0 sm:scale-100"
            To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        -->
                <form action="" method="get"
                    class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl">
                    <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                    Filtrar Registros
                                </h3>
                                <div class="mt-2">
                                    <div class="grid grid-cols-2 gap-10">
                                        <div>
                                            <x-input-label for="birth" >
                                                <br>Cédula<br>
                                            </x-input-label>
                                            <x-text-input wire:model="ci" id="ci" name="ci" type="text"
                                                class="mt-1 block w-full" autocomplete="none"/>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-10">
                                        <div class="">
                                            <x-input-label for="child" value="Nombre del niño/niña" />
                                            <x-text-input wire:model="child" id="child" name="child" type="text"
                                                class="mt-1 block w-full"  autofocus autocomplete="none" />
                                        </div>
                                        <div>
                                            <x-input-label for="mother" value="Nombre de la mamá" />
                                            <x-text-input wire:model="mother" id="mother" name="mother" type="text"
                                                class="mt-1 block w-full" autofocus autocomplete="none"/>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-10">
                                        <div>
                                            <x-input-label for="father" value="Nombre del papá" />
                                            <x-text-input wire:model="father" id="father" name="father" type="text"
                                                class="mt-1 block w-full" autofocus autocomplete="none" />
                                        </div>
                                        <div>
                                            <x-input-label for="place_birth" value="Lugar de Nacimiento" />
                                            <x-text-input wire:model="place_birth" id="place_birth" name="place_birth" type="text"
                                                class="mt-1 block w-full"  autofocus autocomplete="none" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-10">
                                        <div>
                                            <x-input-label for="godparents_1" value="Padrino/Madrina/Testigo" />
                                            <x-text-input wire:model="godparents_1" id="godparents_1" name="godparents_1" type="text"
                                                class="mt-1 block w-full" autocomplete="none"/>
                                        </div>
                                        <div>
                                            <x-input-label for="by_priets" value="Confirmado por" />
                                            <x-text-input wire:model="by_priets" id="by_priets" name="by_priets" type="text"
                                                class="mt-1 block w-full" autocomplete="none"/>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-10">
                                        <div>
                                            <x-input-label for="birth" >
                                                <br>Fecha de Nacimiento <br>
                                            </x-input-label>
                                            <x-text-input wire:model="birth" id="birth" name="birth" type="date"
                                                class="mt-1 block w-full"/>
                                        </div>
                                        <div>
                                            <x-input-label for="date" value="Fecha de Bautismo/Confirmacion/Matrimonio" />
                                            <x-text-input wire:model="date" id="date" name="date" type="date"
                                                class="mt-1 block w-full"  />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-10">
                                        <div>
                                            <x-input-label for="num_libro" value="Número Libro" />
                                            <x-text-input wire:model="num_libro" id="num_libro" name="num_libro" type="text"
                                                class="mt-1 block w-full" autocomplete="none"/>
                                        </div>
                                        <div>
                                            <x-input-label for="num_folio" value="Número Folio" />
                                            <x-text-input wire:model="num_folio" id="num_folio" name="num_folio" type="text"
                                                class="mt-1 block w-full"  autocomplete="none" />
                                        </div>
                                        <div>
                                            <x-input-label for="num" value="Número Acta" />
                                            <x-text-input wire:model="num" id="num" name="num" type="text"
                                                class="mt-1 block w-full"  autocomplete="none" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <x-primary-button type="submit" class="mx-3">
                            Buscar
                        </x-primary-button>
                        <x-btn-secondary @click="toggleModal()" type="button">
                            Cerrar
                        </x-btn-secondary>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
