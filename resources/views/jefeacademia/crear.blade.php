<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('proyecto.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Nombre del Proyecto -->
                    <div class="mb-4">
                        <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="mt-1 block w-full" required>
                    </div>

                    <!-- Descripción -->
                    <div class="mb-4">
                        <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="mt-1 block w-full" required></textarea>
                    </div>

                    <!-- Imagen del Proyecto -->
                    <div class="mb-4">
                        <label for="imagen" class="block text-sm font-medium text-gray-700">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="mt-1 block w-full">
                    </div>

                    <!-- PDF del Proyecto -->
                    <div class="mb-4">
                        <label for="pdf" class="block text-sm font-medium text-gray-700">Archivo PDF</label>
                        <input type="file" id="pdf" name="pdf" class="mt-1 block w-full">
                    </div>

                    <!-- Botón de envío -->
                    <div class="mb-4">
                        <button type="submit" class="px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                            Crear Proyecto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
