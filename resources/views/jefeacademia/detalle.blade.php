<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalle del Proyecto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Nombre: {{ $proyecto->nombre }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400">
                        Descripción: {{ $proyecto->descripcion }}
                    </p>
                    <p class="text-gray-600 dark:text-gray-400">
                        Estado: {{ ucfirst($proyecto->estado) }}
                    </p>

                    <!-- Mostrar la imagen del proyecto si existe -->
                    @if ($proyecto->imagen)
                        <div class="mt-4">
                            <img src="{{ asset('storage/' . $proyecto->imagen) }}" alt="Imagen del Proyecto" class="w-full h-auto">
                        </div>
                    @else
                        <p>No hay imagen disponible.</p>
                    @endif

                    <!-- Mostrar el enlace al PDF si existe -->
                    @if ($proyecto->pdf)
                        <div class="mt-4">
                            <a href="{{ asset('storage/' . $proyecto->pdf) }}" class="text-indigo-600 hover:text-indigo-800" target="_blank">
                                Ver PDF del Proyecto
                            </a>
                        </div>
                    @else
                        <p>No hay archivo PDF disponible.</p>
                    @endif
                </div>

                <a href="{{ route('jefeacademia.index') }}" 
                    class="text-indigo-600 hover:text-indigo-800 mt-2 block">
                    Regresar a la lista de proyectos
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
