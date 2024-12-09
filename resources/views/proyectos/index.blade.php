<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Proyectos
                    </h3>
                    <!-- Botón para crear un nuevo proyecto -->
                    <a href="{{ route('proyectos.create') }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md shadow-sm hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                        Crear Proyecto
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($proyectos as $proyecto)
                        <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-md shadow-sm">
                            <h4 class="font-semibold text-gray-700 dark:text-gray-300">
                                {{ $proyecto->nombre }}
                            </h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $proyecto->descripcion }}
                            </p>
                            <a href="{{ route('proyectos.show', $proyecto) }}"
                               class="text-indigo-600 hover:text-indigo-800 dark:text-indigo-400 dark:hover:text-indigo-500">
                                Ver detalles
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-600 dark:text-gray-400">No hay proyectos disponibles.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
