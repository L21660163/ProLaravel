<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Formulario para subir archivos -->
                <form class="space-y-4" action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nombre del proyecto
                        </label>
                        <input type="text" id="nombre" name="nombre" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                    </div>

                    <div>
                        <label for="descripcion" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Descripción
                        </label>
                        <textarea id="descripcion" name="descripcion"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300"></textarea>
                    </div>

                    <div>
                        <label for="estado" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Estado
                        </label>
                        <select id="estado" name="estado" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="revision">Revisión</option>
                            <option value="evaluacion">Evaluación</option>
                            <option value="vigente">Vigente</option>
                            <option value="finalizado">Finalizado</option>
                        </select>
                    </div>

                    <div>
                        <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Imagen del proyecto
                        </label>
                        <input type="file" id="imagen" name="imagen" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0 file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:bg-gray-700 dark:text-gray-300">
                    </div>

                    <div>
                        <label for="pdf" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Documento PDF
                        </label>
                        <input type="file" id="pdf" name="pdf" accept="application/pdf"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0 file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:bg-gray-700 dark:text-gray-300">
                    </div>

                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Guardar Proyecto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
