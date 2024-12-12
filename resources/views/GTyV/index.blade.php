<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Compañía') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form class="space-y-4" action="{{ route('gtv.store') }}" method="POST">
                    @csrf

                    <!-- Nombre -->
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                        <input type="text" id="nombre" name="nombre" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                    </div>

                    <!-- RFC -->
                    <div>
                        <label for="rfc" class="block text-sm font-medium text-gray-700 dark:text-gray-300">RFC</label>
                        <input type="text" id="rfc" name="rfc" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                    </div>

                    <!-- ID Person -->
                    <div>
                        <label for="id_person" class="block text-sm font-medium text-gray-700 dark:text-gray-300">ID Persona</label>
                        <input type="number" id="id_person" name="id_person" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                    </div>

                    <!-- Estatus -->
                    <div>
                        <label for="id_dictum" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Estatus</label>
                        <select id="id_dictum" name="id_dictum" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="1">Rechazado</option>
                            <option value="2">Pendiente</option>
                            <option value="3">Aceptado</option>
                        </select>
                    </div>

                    <!-- Sector -->
                    <div>
                        <label for="id_sector" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sector</label>
                        <select id="id_sector" name="id_sector" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="1">Público</option>
                            <option value="2">Privado</option>
                        </select>
                    </div>

                    <!-- Active -->
                    <div>
                        <label for="active" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Activo</label>
                        <select id="active" name="active" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <!-- Botón de envío -->
                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Registrar Compañía
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
