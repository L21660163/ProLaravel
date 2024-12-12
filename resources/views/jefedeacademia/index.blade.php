<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Proyectos Pendientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mt-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Lista de proyectos pendientes
                    </h3>

                    <!-- Mostrar mensajes de éxito -->
                    @if(session('success'))
                        <div class="bg-green-100 text-green-800 p-3 rounded mt-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Grid de proyectos -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-4">
                        @foreach($proyectos as $proyecto)
                            <div class="bg-white dark:bg-gray-700 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 ease-in-out transform hover:scale-105 p-6">
                                <div class="relative">
                                    <!-- Título del proyecto -->
                                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                        {{ $proyecto->titulo }}
                                    </h4>

                                    <!-- Objetivo general -->
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        {{ $proyecto->objetivo_general }}
                                    </p>

                                    <!-- Control number -->
                                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        <strong>Control Number:</strong> {{ $proyecto->control_number }}
                                    </p>

                                    <!-- Mostrar archivos PDF -->
                                    @if($proyecto->projectFiles->isNotEmpty())
                                        <div class="mt-4">
                                            <h5 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Archivos:</h5>
                                            <ul class="list-disc list-inside text-gray-600 dark:text-gray-400">
                                                @foreach($proyecto->projectFiles as $file)
                                                    <li>
                                                        <a href="{{ asset($file->ruta) }}" target="_blank" class="text-blue-500 hover:underline">
                                                            {{ $file->name }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-4">
                                            No hay archivos asociados a este proyecto.
                                        </p>
                                    @endif

                                    <!-- Formulario único para aceptar o rechazar -->
                                    <form id="form_{{ $proyecto->id }}" action="{{ route('jefedeacademia.proceso', $proyecto->id) }}" method="POST" class="mt-4">
                                        @csrf
                                        <label for="comentarios_{{ $proyecto->id }}" class="text-sm text-gray-800 dark:text-gray-200">
                                            Comentarios (opcional)
                                        </label>
                                        <textarea name="comentarios" id="comentarios_{{ $proyecto->id }}" rows="2"
                                            class="w-full mt-2 p-2 border border-gray-300 rounded-md focus:ring focus:border-green-500 dark:bg-gray-700 dark:text-gray-300"
                                            placeholder="Agregar un comentario"></textarea>

                                        <!-- Botón para Aceptar y Rechazar -->
                                        <div class="flex justify-between mt-4 space-x-2">
                                            <button type="button" onclick="showConfirmationModal('aceptar', {{ $proyecto->id }})" class="w-1/2 px-4 py-2 bg-green-600 text-white rounded-lg shadow-md hover:bg-green-700 transition-all duration-300">
                                                Aceptar
                                            </button>
                                            <button type="button" onclick="showConfirmationModal('rechazar', {{ $proyecto->id }})" class="w-1/2 px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-700 transition-all duration-300">
                                                Rechazar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Si no hay proyectos pendientes -->
                    @if($proyectos->isEmpty())
                        <p class="text-center text-gray-600 dark:text-gray-400 mt-4">
                            No hay proyectos pendientes por el momento.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
            <h3 class="text-xl font-semibold text-gray-800">¿Estás seguro?</h3>
            <p class="mt-4 text-gray-600" id="confirmMessage">¿Estás seguro de que deseas realizar esta acción?</p>
            <div class="flex justify-end mt-4">
                <button id="confirmButton" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Sí</button>
                <button id="cancelButton" class="ml-4 px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">No</button>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    // Función para mostrar el modal de confirmación
    function showConfirmationModal(accion, proyectoId) {
        const modal = document.getElementById('confirmModal');
        const confirmButton = document.getElementById('confirmButton');
        const cancelButton = document.getElementById('cancelButton');
        const confirmMessage = document.getElementById('confirmMessage');

        // Mostrar el modal
        modal.classList.remove('hidden');

        // Cambiar el texto de la acción en el modal
        if (accion === 'aceptar') {
            confirmMessage.textContent = '¿Estás seguro de que deseas aprobar este proyecto?';
        } else if (accion === 'rechazar') {
            confirmMessage.textContent = '¿Estás seguro de que deseas rechazar este proyecto?';
        }

        // Asignar el valor correcto al botón de confirmación
        confirmButton.onclick = function() {
            // Establecer el valor de la acción en el formulario
            const form = document.getElementById('form_' + proyectoId);
            const accionInput = document.createElement('input');
            accionInput.type = 'hidden';
            accionInput.name = 'accion';
            accionInput.value = accion;
            form.appendChild(accionInput);

            // Enviar el formulario
            form.submit();
        };

        // Cerrar el modal si el usuario hace clic en 'No'
        cancelButton.onclick = function() {
            modal.classList.add('hidden');
        };
    }
</script>
