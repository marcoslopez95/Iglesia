{{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}

<x-slot name="header">
    <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bautismos
        </h2>
        <div>
            <x-btn-primary href="{{ route('bautismos.create') }}" >
                Crear
            </x-btn-primary>
        </div>
    </div>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <table class="w-full">
                    <thead class="font-semibold border-b-2 border-gray-300">
                        <tr>
                            @foreach ($headers as $head)
                                <td class="text-center">
                                    {{ $head['title'] }}
                                </td>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                @foreach ($headers as $head)
                                    <td class="text-center">
                                        {{ $document[$head['value']] }}
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
