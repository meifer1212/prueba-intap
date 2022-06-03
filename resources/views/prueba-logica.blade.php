<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white gap-4 overflow-hidden shadow-xl sm:rounded-lg p-6 relative flex flex-col justify-center">
                <div class="text-center">
                    <h1 class="text-lg font-extrabold uppercase">
                        Prueba Lógica
                    </h1>
                </div>
                <hr>
                <div class="uppercase text-center font-bold">
                    <p>Item #1 (Número más alto)</p>
                </div>
                <div class="text-center">
                    <p class="uppercase">
                        los valores de myArray son: @json($myArrayItemOne)
                    </p>
                </div>
                <div class="text-center justify-center flex flex-raw">
                    <p class="uppercase">
                        el número más alto es <span class="font-bold underline">{{ $highNumber }}</span>
                    </p>
                    <div class="ml-2 cursor-pointer"
                        title="Puedes actualizar la página web para probar con otros números en myArray">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <hr>
                <div class="uppercase text-center font-bold">
                    <p>Item #2 (Histograma)</p>
                </div>
                <div class="text-center">
                    <p class="uppercase">
                        los valores de myArray son: @json($myArrayItemTwo)
                    </p>
                </div>
                <div class="text-center">
                    <p class="uppercase">
                        @foreach ($histogram as $number => $key)
                            <p>{{ $number . ': ' . str_repeat('*', $key) }}</p>
                        @endforeach
                    </p>
                </div>
                <hr>
                <div class="uppercase text-center font-bold">
                    <p>Item #3 (Número que más se repite y cantidad)</p>
                </div>
                <div class="text-center">
                    <p class="uppercase">
                        los valores de myArray son: @json($myArrayItemThree)
                    </p>
                </div>
                <div class="text-center">
                    <p class="uppercase font-bold">
                       @foreach ($maxRepeat as $item)
                           {{'Número más repetido: '.$item['number'] . ' Cantidad de repeticiónes: ' . $item['repeat']}}
                       @endforeach
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</x-app-layout>
