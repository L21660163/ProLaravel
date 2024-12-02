
    <!-- Botones en el lado izquierdo -->
    <x-primary-button>
    <a href="{{ route('descargar.formatos') }}" class="text-black">{{ __('Descargar Formatos') }}</a>
    </x-primary-button>

    <x-danger-button class="ms-6 text-center">
        <a href="{{ route('formatos') }}">{{ __('Ver y Enviar Documentos') }}</a>
    </x-danger-button>



<!-- Botón Mi Proyecto centrado debajo del título y botones -->
<div class="mt-6 text-center">
    <x-primary-button>{{ __('Mi Proyecto') }}</x-primary-button>      
</div>
