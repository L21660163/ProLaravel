<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Subir Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Formulario de subida -->
                <form class="space-y-4" action="{{ route('residenceproject.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Título del Proyecto
                        </label>
                        <input type="text" id="titulo" name="titulo" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                    </div>
                    <div>
                        <label for="id_project_type" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Tipo de Proyecto
                        </label>
                        <select id="id_project_type" name="id_project_type" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="1">Propuesta de valor</option>
                            <option value="2">Banco de proyectos</option>
                        </select>
                    </div>
                    <div>
                        <label for="id_nature" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Naturaleza del Proyecto
                        </label>
                        <select id="id_nature" name="id_nature" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="1">Local</option>
                            <option value="2">Regional</option>
                            <option value="3">Nacional</option>
                        </select>
                    </div>
                    <div>
                        <label for="id_ambit" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Ámbito del Proyecto
                        </label>
                        <select id="id_ambit" name="id_ambit" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300">
                            <option value="1">Investigación</option>
                            <option value="2">Innovación y desarrollo tecnológico</option>
                            <option value="3">Sector social, productivo de bienes y servicios</option>
                            <option value="4">Veranos científicos o de investigación</option>
                            <option value="5">Proyecto integrador</option>
                            <option value="6">Proyecto bajo enfoque de Educación dual</option>
                        </select>
                    </div>
                    <div>
                        <label for="objetivo_general" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Objetivo General
                        </label>
                        <textarea id="objetivo_general" name="objetivo_general" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:text-gray-300"></textarea>
                    </div>
                    <div>
                        <label for="pdf_file" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Subir Archivo PDF
                        </label>
                        <input type="file" id="pdf_file" name="pdf_file" required
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                            file:rounded-md file:border-0 file:text-sm file:font-semibold
                            file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:bg-gray-700 dark:text-gray-300">
                    </div>
                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                            Subir Proyecto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
