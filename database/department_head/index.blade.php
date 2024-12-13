<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyectos del Jefe de Departamento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Navegación de pestañas -->
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <nav class="flex space-x-4" id="tabs" role="tablist">
                        <button class="tab-link text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 py-2 px-4 border-b-2 font-medium text-sm focus:outline-none"
                            data-target="revision" role="tab" aria-controls="revision" aria-selected="true">
                            Revisión por Academia
                        </button>
                        <button class="tab-link text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 py-2 px-4 border-b-2 font-medium text-sm focus:outline-none"
                            data-target="evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">
                            En Evaluación
                        </button>
                        <button class="tab-link text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 py-2 px-4 border-b-2 font-medium text-sm focus:outline-none"
                            data-target="vigentes" role="tab" aria-controls="vigentes" aria-selected="false">
                            Vigentes
                        </button>
                        <button class="tab-link text-gray-600 dark:text-gray-300 hover:text-indigo-600 dark:hover:text-indigo-400 py-2 px-4 border-b-2 font-medium text-sm focus:outline-none"
                            data-target="finalizados" role="tab" aria-controls="finalizados" aria-selected="false">
                            Finalizados
                        </button>
                    </nav>
                </div>

                <!-- Contenido de las pestañas -->
                <div class="mt-4">
                    <!-- Proyectos en revisión -->
                    <div id="revision" class="tab-content">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Proyectos en revisión por academia</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($projects['revision_academica'] as $project)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100">{{ $project->titulo }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Fase: {{ $project->phase->nombre }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                        <strong>Objetivo:</strong> {{ Str::limit($project->objetivo_general, 100) }}
                                    </p>
                                    <a href="#" class="mt-3 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">Ver más detalles</a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Proyectos en evaluación -->
                    <div id="evaluacion" class="tab-content hidden">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Proyectos en evaluación</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($projects['evaluacion'] as $project)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100">{{ $project->titulo }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Fase: {{ $project->phase->nombre }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                        <strong>Objetivo:</strong> {{ Str::limit($project->objetivo_general, 100) }}
                                    </p>
                                    <a href="#" class="mt-3 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">Ver más detalles</a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Proyectos vigentes -->
                    <div id="vigentes" class="tab-content hidden">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Proyectos vigentes</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($projects['vigentes'] as $project)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100">{{ $project->titulo }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Fase: {{ $project->phase->nombre }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                        <strong>Objetivo:</strong> {{ Str::limit($project->objetivo_general, 100) }}
                                    </p>
                                    <a href="#" class="mt-3 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">Ver más detalles</a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Proyectos finalizados -->
                    <div id="finalizados" class="tab-content hidden">
                        <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200 mb-4">Proyectos finalizados</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @foreach ($projects['finalizados'] as $project)
                                <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-md">
                                    <h4 class="font-semibold text-gray-800 dark:text-gray-100">{{ $project->titulo }}</h4>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">Fase: {{ $project->phase->nombre }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">
                                        <strong>Objetivo:</strong> {{ Str::limit($project->objetivo_general, 100) }}
                                    </p>
                                    <a href="#" class="mt-3 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">Ver más detalles</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para alternar pestañas -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-link');
            const contents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Desactivar todas las pestañas y contenidos
                    tabs.forEach(t => t.classList.remove('border-indigo-600'));
                    contents.forEach(content => content.classList.add('hidden'));

                    // Activar pestaña seleccionada
                    tab.classList.add('border-indigo-600');
                    document.getElementById(tab.dataset.target).classList.remove('hidden');
                });
            });
        });
    </script>
</x-app-layout>