<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Documentos') }}
        </h2>
    </x-slot>

    <div class="min-h-screen bg-gray text-xl text-gray dark:text-gray-200 leading-tight">

        <!-- Barra de navegación (toolbar) -->
        <div class="bg-blue-600 p-4 rounded-lg shadow-lg mb-6">
            <div class="flex space-x-6">
                <button id="misDocumentos" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Mis Documentos
                </button>
                <button id="cartaAceptacion" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Carta de Aceptación
                </button>
                <button id="cartaPresentacion" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Carta de Presentación
                </button>
                <button id="informeTecnico" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Informe Técnico
                </button>
                <button id="formato8a" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Formato 8A
                </button>
                <button id="formato8b" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Formato 8B
                </button>
                <button id="formato9" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Formato 9
                </button>
                <button id="cartaTerminacion" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none transition duration-200 ease-in-out">
                    Carta de Terminación
                </button>
            </div>
        </div>

        <!-- Secciones de contenido -->
        <div class="p-6">
            <div id="misDocumentosSection" class="section-content dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Mis Documentos</h2>
                <p>Contenido relacionado con los documentos...</p>
                <!-- Formulario para subir archivos -->
                <form action="{{ route('archivo.subir') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
                    @csrf
                    <div>
                        <label for="nombre" class="text-gray-700 dark:text-gray-300">Nombre del archivo:</label>
                        <input type="text" id="nombre" name="nombre" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="archivo" class="text-gray-700 dark:text-gray-300">Selecciona el archivo:</label>
                        <input type="file" id="archivo" name="archivo" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none transition duration-200 ease-in-out">Subir archivo</button>
                </form>
            </div>

            <!-- Sección para Carta de Aceptación -->
            <div id="cartaAceptacionSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Carta de Aceptación</h2>
                <p>Contenido relacionado con la carta de aceptación...</p>
                <!-- Formulario para subir archivos -->
                <form action="{{ route('archivo.subir') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-4">
                    @csrf
                    <div>
                        <label for="nombre" class="text-gray-700 dark:text-gray-300">Nombre del archivo:</label>
                        <input type="text" id="nombre" name="nombre" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="archivo" class="text-gray-700 dark:text-gray-300">Selecciona el archivo:</label>
                        <input type="file" id="archivo" name="archivo" required class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 focus:outline-none transition duration-200 ease-in-out">Subir archivo</button>
                </form>
            </div>

            <!-- Agregar las demás secciones con el mismo formulario de subida de archivos -->
            <!-- Repite la estructura para las otras secciones (Carta de Presentación, Informe Técnico, etc.) -->

        </div>
    </div>

    <!-- Scripts para cambiar las secciones -->
    <script>
        const sections = document.querySelectorAll('.section-content');
        const buttons = document.querySelectorAll('button');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                // Ocultar todas las secciones
                sections.forEach(section => section.classList.add('hidden'));

                // Mostrar la sección correspondiente
                const sectionId = button.id + 'Section';
                document.getElementById(sectionId).classList.remove('hidden');
            });
        });
    </script>
</x-app-layout>
