<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestión de Proyectos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">

            <!-- Botón para crear un nuevo proyecto -->
                <div class="mb-8">
                    <a href="{{ route('proyecto.crear') }}" 
                    class="inline-block px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700">
                        Crear Proyecto
                    </a>
                </div>

                <!-- Proyectos en revisión por academia -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Proyectos en Revisión por Academia
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                        @foreach($proyectosRevision as $proyecto)
                            <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden shadow-sm">
                                <div class="p-4">
                                    <p class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                                        {{ $proyecto->nombre }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $proyecto->descripcion }}
                                    </p>
                                    
                                    <!-- Mostrar imagen si existe -->
                                    @if($proyecto->imagen)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $proyecto->imagen) }}" alt="Imagen del Proyecto" class="w-full h-32 object-cover rounded-md">
                                        </div>
                                    @endif

                                    <!-- Enlace al archivo PDF si existe -->
                                    @if($proyecto->pdf)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $proyecto->pdf) }}" 
                                               class="text-indigo-600 hover:text-indigo-800" 
                                               target="_blank">
                                                Ver PDF
                                            </a>
                                        </div>
                                    @endif

                                    <a href="{{ route('proyecto.detalle', $proyecto->id) }}" 
                                        class="text-indigo-600 hover:text-indigo-800 mt-2 block">
                                        Ver Detalle
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Proyectos en proceso de evaluación -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Proyectos en Proceso de Evaluación
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                        @foreach($proyectosEvaluacion as $proyecto)
                            <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden shadow-sm">
                                <div class="p-4">
                                    <p class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                                        {{ $proyecto->nombre }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $proyecto->descripcion }}
                                    </p>
                                    
                                    <!-- Mostrar imagen si existe -->
                                    @if($proyecto->imagen)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $proyecto->imagen) }}" alt="Imagen del Proyecto" class="w-full h-32 object-cover rounded-md">
                                        </div>
                                    @endif

                                    <!-- Enlace al archivo PDF si existe -->
                                    @if($proyecto->pdf)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $proyecto->pdf) }}" 
                                               class="text-indigo-600 hover:text-indigo-800" 
                                               target="_blank">
                                                Ver PDF
                                            </a>
                                        </div>
                                    @endif

                                    <a href="{{ route('proyecto.detalle', $proyecto->id) }}" 
                                        class="text-indigo-600 hover:text-indigo-800 mt-2 block">
                                        Ver Detalle
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Proyectos vigentes -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Proyectos Vigentes
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                        @foreach($proyectosVigentes as $proyecto)
                            <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden shadow-sm">
                                <div class="p-4">
                                    <p class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                                        {{ $proyecto->nombre }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $proyecto->descripcion }}
                                    </p>
                                    
                                    <!-- Mostrar imagen si existe -->
                                    @if($proyecto->imagen)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $proyecto->imagen) }}" alt="Imagen del Proyecto" class="w-full h-32 object-cover rounded-md">
                                        </div>
                                    @endif

                                    <!-- Enlace al archivo PDF si existe -->
                                    @if($proyecto->pdf)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $proyecto->pdf) }}" 
                                               class="text-indigo-600 hover:text-indigo-800" 
                                               target="_blank">
                                                Ver PDF
                                            </a>
                                        </div>
                                    @endif

                                    <a href="{{ route('proyecto.detalle', $proyecto->id) }}" 
                                        class="text-indigo-600 hover:text-indigo-800 mt-2 block">
                                        Ver Detalle
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Proyectos finalizados -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Proyectos Finalizados
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-4">
                        @foreach($proyectosFinalizados as $proyecto)
                            <div class="border border-gray-300 dark:border-gray-700 rounded-lg overflow-hidden shadow-sm">
                                <div class="p-4">
                                    <p class="text-sm text-gray-700 dark:text-gray-300 font-medium">
                                        {{ $proyecto->nombre }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ $proyecto->descripcion }}
                                    </p>
                                    
                                    <!-- Mostrar imagen si existe -->
                                    @if($proyecto->imagen)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $proyecto->imagen) }}" alt="Imagen del Proyecto" class="w-full h-32 object-cover rounded-md">
                                        </div>
                                    @endif

                                    <!-- Enlace al archivo PDF si existe -->
                                    @if($proyecto->pdf)
                                        <div class="mt-2">
                                            <a href="{{ asset('storage/' . $proyecto->pdf) }}" 
                                               class="text-indigo-600 hover:text-indigo-800" 
                                               target="_blank">
                                                Ver PDF
                                            </a>
                                        </div>
                                    @endif

                                    <a href="{{ route('proyecto.detalle', $proyecto->id) }}" 
                                        class="text-indigo-600 hover:text-indigo-800 mt-2 block">
                                        Ver Detalle
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
