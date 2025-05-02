<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Reporte de Mis Solicitudes de Recolección') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-gray-100">Reporte de Solicitudes</h1>

                @if($collectionRequests->isEmpty())
                <div class="text-center text-gray-600 dark:text-gray-400">
                    No tienes solicitudes registradas para mostrar.
                </div>
                @else
                <table class="table-auto w-full text-gray-800 dark:text-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left">Tipo de Residuo</th>
                            <th class="px-4 py-2 text-left">Cantidad</th>
                            <th class="px-4 py-2 text-left">Fecha de Recolección</th>
                            <th class="px-4 py-2 text-left">Dirección</th>
                            <th class="px-4 py-2 text-left">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($collectionRequests as $request)
                        <tr class="border-t border-gray-600">
                            <td class="px-4 py-2">{{ $request->type_of_waste }}</td>
                            <td class="px-4 py-2">{{ $request->amount }}</td>
                            <td class="px-4 py-2">{{ $request->collection_date }}</td>
                            <td class="px-4 py-2">{{ $request->address }}</td>
                            <td class="px-4 py-2 capitalize">{{ str_replace('_', ' ', $request->status) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                <div class="mt-6">
                    <a href="{{ route('collection_requests.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Volver a Solicitudes
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>