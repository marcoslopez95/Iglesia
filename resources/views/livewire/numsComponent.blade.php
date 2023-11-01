<div class="grid grid-cols-3 gap-10">
    <div>
        <x-input-label for="num_libro" value="Número Libro" />
        <x-text-input wire:model="num_libro" id="num_libro" name="num_libro" type="text"
            class="mt-1 block w-full"/>
        <x-input-error class="mt-2" :messages="$errors->get('num_libro')" />
    </div>
    <div>
        <x-input-label for="num_folio" value="Número Folio" />
        <x-text-input wire:model="num_folio" id="num_folio" name="num_folio" type="text"
            class="mt-1 block w-full" autofocus  />
        <x-input-error class="mt-2" :messages="$errors->get('num_folio')" />
    </div>
    <div>
        <x-input-label for="num" value="Número Acta" />
        <x-text-input wire:model="num" id="num" name="num" type="text"
            class="mt-1 block w-full" autofocus autocompl />
        <x-input-error class="mt-2" :messages="$errors->get('num')" />
    </div>
</div>
