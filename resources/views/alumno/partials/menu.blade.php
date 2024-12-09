<div class="min-h-screen bg-gray-100">

    <!-- Barra de navegación (toolbar) -->
    <div class="bg-blue-600 p-4">
        <div class="flex space-x-6">
            <!-- Opciones de la barra de navegación -->
            <button id="misDocumentos" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Mis Documentos
            </button>
            <button id="cartaAceptacion" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Carta de Aceptación
            </button>
            <button id="cartaPresentacion" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Carta de Presentación
            </button>
            <button id="informeTecnico" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Informe Técnico
            </button>
            <button id="formato8a" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Formato 8A
            </button>
            <button id="formato8b" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Formato 8B
            </button>
            <button id="formato9" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Formato 9
            </button>
            <button id="cartaTerminacion" class="text-white hover:bg-blue-700 px-4 py-2 rounded-md focus:outline-none">
                Carta de Terminación
            </button>
        </div>
    </div>

    <!-- Secciones de contenido (por defecto solo se muestra "Mis Documentos") -->
    <div class="p-6">
        <div id="misDocumentosSection" class="section-content">
            <h2 class="text-xl font-semibold">Mis Documentos</h2>
            <p>Contenido relacionado con los documentos...</p>
        </div>

        <div id="cartaAceptacionSection" class="section-content hidden">
            <h2 class="text-xl font-semibold">Carta de Aceptación</h2>
            <p>Contenido relacionado con la carta de aceptación...</p>
        </div>

        <div id="cartaPresentacionSection" class="section-content hidden">
            <h2 class="text-xl font-semibold">Carta de Presentación</h2>
            <p>Contenido relacionado con la carta de presentación...</p>
        </div>

        <div id="informeTecnicoSection" class="section-content hidden">
            <h2 class="text-xl font-semibold">Informe Técnico</h2>
            <p>Contenido relacionado con el informe técnico...</p>
        </div>

        <div id="formato8aSection" class="section-content hidden">
            <h2 class="text-xl font-semibold">Formato 8A</h2>
            <p>Contenido relacionado con Formato 8A...</p>
        </div>

        <div id="formato8bSection" class="section-content hidden">
            <h2 class="text-xl font-semibold">Formato 8B</h2>
            <p>Contenido relacionado con Formato 8B...</p>
        </div>

        <div id="formato9Section" class="section-content hidden">
            <h2 class="text-xl font-semibold">Formato 9</h2>
            <p>Contenido relacionado con Formato 9...</p>
        </div>

        <div id="cartaTerminacionSection" class="section-content hidden">
            <h2 class="text-xl font-semibold">Carta de Terminación</h2>
            <p>Contenido relacionado con la carta de terminación...</p>
        </div>
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
