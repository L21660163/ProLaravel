<!-- Contenedor para el título y los botones en la misma fila -->
<div class="flex items-center justify-between mb-6">
    <!-- Título alineado a la izquierda con ícono al lado derecho -->
    <h1 class="text-xl font-semibold text-white flex items-center space-x-2">
        <span>{{ __('Mis proyectos') }}</span>
        <!-- Ícono relacionado con una carpeta o proyecto -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6a2 2 0 012-2h4l2 2h7a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6z"></path>
        </svg>
    </h1>

    <!-- Contenedor de los botones alineados a la derecha -->
    <div class="flex space-x-4">
        <!-- Botón Descargar Formatos -->
        <x-primary-button>
            <a href="{{ route('descargar.formatos') }}" class="text-black">{{ __('Descargar Formatos') }}</a>
        </x-primary-button>

        <!-- Botón Ver y Enviar Documentos -->
        <x-danger-button>
            <a href="{{ route('formatos') }}">{{ __('Ver y Enviar Documentos') }}</a>
        </x-danger-button>
    </div>
</div>

<!-- Botón Mi Proyecto centrado debajo de los anteriores -->
<div class="mt-6 text-center">
    <x-primary-button>{{ __('Mi Proyecto') }}</x-primary-button>      
</div>
