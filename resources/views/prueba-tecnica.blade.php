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
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                    <form action="{{ route('prueba-tecnica.store') }}" method="post">
                        @csrf
                        <div class="text-center flex flex-raw gap-3 w-full">
                            <div class="mb-4 w-[33%]">
                                <label class="block text-gray-700 text-sm font-bold" for="Actividad">
                                    Actividad
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-52 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="activity" name="activity" type="text" placeholder="Ej. Actualizaciones de ..."
                                    value="{{ old('activity') }}" required>
                                <x-jet-input-error for="activity" />
                            </div>
                            <div class="mb-4 w-[33%]">
                                <label class="block text-gray-700 text-sm font-bold" for="hours">
                                    Horas Empleadas
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-52 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="hours" type="number" name="hours" placeholder="Ej. 5"
                                    value="{{ old('hours') }}" required>
                                <x-jet-input-error for="hours" />
                            </div>
                            <div class="mb-4 w-[33%]">
                                <label class="block text-gray-700 text-sm font-bold" for="Fecha de la Actividad">
                                    Fecha de la Actividad
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-52 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="date" name="date" type="date"
                                    value="{{ old('date') ?? now()->format('Y-m-d') }}" required>
                                <x-jet-input-error for="date" />
                            </div>
                        </div>
                        <div class="text-center">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                    <hr>
                    <table class="text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Actividad</th>
                                <th>Horas Empleadas</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td class="p-2">
                                        {{ $activities->perPage() * ($activities->currentPage() - 1) + $loop->iteration }}
                                    </td>
                                    <td>{{ $activity->activity }}</td>
                                    <td>{{ $activity->hours }}</td>
                                    <td>{{ $activity->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
            {{ $activities->links() }}
        </div>
    </div>
</x-app-layout>
