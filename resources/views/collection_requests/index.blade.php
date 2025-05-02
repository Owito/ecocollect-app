<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Solicitudes de Recolección') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Mis Solicitudes de Recolección</h1>

                <a href="{{ route('collection_requests.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">
                    Nueva Solicitud
                </a>

                @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-6">
                    {{ session('success') }}
                </div>
                @endif

                <div class="overflow-x-auto rounded-lg shadow-lg">
                    <table class="table-auto w-full text-gray-800 dark:text-white">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Tipo de Residuo</th>
                                <th class="px-4 py-2 text-left">Cantidad</th>
                                <th class="px-4 py-2 text-left">Fecha de Recolección</th>
                                <th class="px-4 py-2 text-left">Dirección</th>
                                <th class="px-4 py-2 text-left">Estado</th>
                                <th class="px-4 py-2 text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($collectionRequests as $request)
                            <tr class="border-t border-gray-600">
                                <td class="px-4 py-2">{{ $request->type_of_waste }}</td>
                                <td class="px-4 py-2">{{ $request->amount }}</td>
                                <td class="px-4 py-2">{{ $request->collection_date }}</td>
                                <td class="px-4 py-2">{{ $request->address }}</td>
                                <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $request->status) }}</td>
                                <td class="px-4 py-2 flex space-x-2">
                                    <a href="{{ route('collection_requests.edit', $request) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-1 px-3 rounded">
                                        Editar
                                    </a>

                                    <form action="{{ route('collection_requests.destroy', $request) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta solicitud?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">No tienes solicitudes registradas.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>