<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subir Archivo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Formulario -->
                <form class="space-y-4" action="{{ route('archivo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <label for="id_project" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Seleccionar usuario
                        </label>
                        <select id="id_project" name="id_project" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="" disabled selected>-- Seleccionar Usuario --</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="archivo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Subir archivo
                        </label>
                        <input type="file" id="archivo" name="archivo" class="block w-full text-sm text-gray-500">
                    </div>

                    <div>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm">
                            Subir
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
