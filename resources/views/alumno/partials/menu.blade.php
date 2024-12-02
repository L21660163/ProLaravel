<style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            color: white;
            padding: 0.5rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
        }
        .navbar a:hover {
            background-color: #575757;
            border-radius: 5px;
        }
        .section {
            display: none;
            padding: 20px;
            margin-top: 20px;
        }

        .active {
            display: block; /* Only display the active section */
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="#" onclick="showSection('misDocumentos')">Mis documentos</a>
        <a href="#" onclick="showSection('cartaAceptacion')">Carta de aceptación</a>
        <a href="#" onclick="showSection('cartaPresentacion')">Carta de presentación</a>
        <a href="#" onclick="showSection('informeTecnico')">Informe técnico</a>
        <a href="#" onclick="showSection('formato8A')">Formato 8-A</a>
        <a href="#" onclick="showSection('formato8B')">Formato 8-B</a>
        <a href="#" onclick="showSection('formato9')">Formato 9</a>
        <a href="#" onclick="showSection('cartaTerminacion')">Carta de terminación</a>
    </div>

    <div class="container">
        <!-- Sección: Mis Documentos -->
        <div id="misDocumentos" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('alumno.formatos.mydocs')<!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Carta de Aceptación -->
        <div id="cartaAceptacion" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.carta-aceptacion') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Carta de Presentación -->
        <div id="cartaAceptacion" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.carta-presentacion') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Informe Técnico -->
        <div id="informeTecnico" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.informe-tecnico') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Formato 8-A -->
        <div id="formato8A" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.formato8a') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Formato 8-B -->
        <div id="formato8B" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.formato8b') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Formato 9 -->
        <div id="formato9" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.formato9') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>

        <!-- Sección: Carta de Terminación -->
        <div id="cartaTerminacion" class="section">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    @include('alumno.formatos.carta-terminacion') <!-- Aquí se incluiría el contenido -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para mostrar una sección y ocultar las demás
        function showSection(sectionId) {
            console.log("Sección seleccionada:", sectionId); // Verifica cuál sección fue seleccionada
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.remove('active'));

            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.classList.add('active');
            } else {
                console.log("Sección no encontrada:", sectionId); // Verifica si se encuentra el ID
            }
        }

    </script>

</body>