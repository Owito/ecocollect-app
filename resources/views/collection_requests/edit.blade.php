<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Solicitud') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-sm text-red-600 dark:text-red-400">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('collection_requests.update', $collectionRequest->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="type_of_waste" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Tipo de Residuo <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="type_of_waste" id="type_of_waste" value="{{ old('type_of_waste', $collectionRequest->type_of_waste) }}" required
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Cantidad
                        </label>
                        <input type="text" name="amount" id="amount" value="{{ old('amount', $collectionRequest->amount) }}"
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="collection_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Fecha de Recolección <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="collection_date" id="collection_date" value="{{ old('collection_date', $collectionRequest->collection_date) }}" required
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mb-4">
                        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Dirección <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="address" id="address" value="{{ old('address', $collectionRequest->address) }}" required
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div class="mb-6">
                        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Estado <span class="text-red-500">*</span>
                        </label>
                        <select name="status" id="status" required
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white rounded-md shadow-sm focus:ring focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="pendiente" {{ old('status', $collectionRequest->status) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                            <option value="en_proceso" {{ old('status', $collectionRequest->status) == 'en_proceso' ? 'selected' : '' }}>En Proceso</option>
                            <option value="completado" {{ old('status', $collectionRequest->status) == 'completado' ? 'selected' : '' }}>Completado</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('collection_requests.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150 mr-2">
                            Cancelar
                        </a>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Actualizar Solicitud
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>