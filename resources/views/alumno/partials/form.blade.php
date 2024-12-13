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
                
            </div>

            <!-- Sección para Carta de Aceptación -->
            <div id="cartaAceptacionSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Carta de Aceptación</h2>
                <p>Contenido relacionado con la carta de aceptación...</p>
                <!-- Formulario para subir archivos -->
                <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="document">Subir documento PDF:</label>
                        <input type="file" name="document" id="document" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir Documento</button>
                </form>

            </div>

            <!-- Sección para Carta de Presentación -->
            <div id="cartaPresentacionSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Carta de Presentación</h2>
                <p>Contenido relacionado con la carta de presentación...</p>
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

            <!-- Sección para Informe Técnico -->
            <div id="informeTecnicoSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Informe Técnico</h2>
                <p>Contenido relacionado con el informe técnico...</p>
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

            <!-- Sección para Formato 8A -->
            <div id="formato8aSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Formato 8A</h2>
                <p>Contenido relacionado con el Formato 8A...</p>
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

            <!-- Sección para Formato 8B -->
            <div id="formato8bSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Formato 8B</h2>
                <p>Contenido relacionado con el Formato 8B...</p>
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

            <!-- Sección para Formato 9 -->
            <div id="formato9Section" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Formato 9</h2>
                <p>Contenido relacionado con el Formato 9...</p>
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

            <!-- Sección para Carta de Terminación -->
            <div id="cartaTerminacionSection" class="section-content hidden dark:bg-gray-800 p-4 rounded-lg shadow-lg mb-6">
                <h2 class="text-xl font-semibold">Carta de Terminación</h2>
                <p>Contenido relacionado con la carta de terminación...</p>
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
        </div>

        <script>
            document.querySelectorAll('button').forEach(button => {
                button.addEventListener('click', () => {
                    document.querySelectorAll('.section-content').forEach(section => {
                        section.classList.add('hidden');
                    });

                    const sectionId = button.id + 'Section';
                    document.getElementById(sectionId).classList.remove('hidden');
                });
            });
        </script>
    </div>
</x-app-layout>
