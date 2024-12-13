<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Contenedor para cuando no hay proyectos -->
    <div id="no-projects" class="text-center">
        <div class="mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-12 w-12 text-gray-600 mx-auto">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.978 2.978 0 0118 14V10a6 6 0 10-12 0v4a2.978 2.978 0 01-.595 1.595L4 17h5m6 0a3 3 0 01-6 0" />
            </svg>
        </div>
        <h2 class="text-gray-600 text-xl font-semibold mb-4">Aún no has registrado un proyecto</h2>
        <button 
            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-200"
            id="abrirModal">
            + AGREGAR PROYECTO
        </button>
    </div>


    <!-- Modal -->
    <div id="modalProyecto" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 items-center justify-center z-50">
        <div x-data="{
            section: 'info',
    residenceProjectTypes: [],
    residenceKinds: [],
    residenceNatures: [],
    residenceAmbits: [],
    personCareer: [],
    residenceCompanies: [],
    selectedType: '',
    selectedKind: '',
    selectedNature: '',
    selectedAmbit: '',
    selectedCareer: '', 
    selectedCompanies: '',
    fetchData() {
        fetch('/residence-project-types')
            .then(response => response.json())
            .then(data => this.residenceProjectTypes = data);

        fetch('/residence-kinds')
            .then(response => response.json())
            .then(data => this.residenceKinds = data);

        fetch('/residence-natures')
            .then(response => response.json())
            .then(data => this.residenceNatures = data);

        fetch('/residence-ambits')
            .then(response => response.json())
            .then(data => this.residenceAmbits = data);

        fetch('/person_career')  
            .then(response => response.json())
            .then(data => {
                this.personCareer = data;
                console.log(this.personCareer);  // Verifica los datos cargados
            });

        fetch('/residence-companies')  
            .then(response => response.json())
            .then(data => {
                this.residenceCompanies = data;
                console.log(this.residenceCompanies);  // Verifica los datos cargados
            });
        }
    }" 
    x-init="fetchData()"
    class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-11/12 md:w-3/4 lg:w-1/2">
                <!-- Navigation Bar -->
                <div class="flex justify-around border-b border-gray-300 dark:border-gray-700 py-2">
                    <button 
                        @click="section = 'info'" 
                        class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 focus:outline-none"
                        :class="section === 'info' ? 'border-b-2 border-indigo-500' : ''">
                        Información Básica
                    </button>
                    <button 
                        @click="section = 'justification'" 
                        class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 focus:outline-none"
                        :class="section === 'justification' ? 'border-b-2 border-indigo-500' : ''">
                        Justificación
                    </button>
                    <button 
                        @click="section = 'comments'" 
                        class="px-4 py-2 text-sm font-semibold text-gray-700 dark:text-gray-200 focus:outline-none"
                        :class="section === 'comments' ? 'border-b-2 border-indigo-500' : ''">
                        Comentarios
                    </button>
                </div>

                <!-- Sections -->
                <div class="p-6">
                    <!-- Información Básica -->
                    <div x-show="section === 'info'">
                        <div class="mb-4">
                        <label class="block text-gray-600 dark:text-gray-300 mb-1" for="empresa">Empresa</label>
                        <select id="empresa" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                            <option>Selecciona una opción</option>
                            <template x-for="company in residenceCompanies" :key="company.id">
                                <option :value="company.id" x-text="company.name"></option>
                            </template>
                        </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 dark:text-gray-300 mb-1" for="titulo">Título del Proyecto</label>
                            <input id="titulo" type="text" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 dark:text-gray-300 mb-1" for="objetivos">Objetivos Específicos</label>
                            <textarea id="objetivos" rows="3" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 dark:text-gray-300 mb-1" for="general">Objetivo General</label>
                            <input id="general" type="text" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                            
                                <label class="block text-gray-600 dark:text-gray-300 mb-1" for="tipo">Tipo de Proyecto</label>
                                <select id="tipo" name="id_project_type" x-model="selectedType" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                                    <option>Selecciona una opción</option>
                                    <template x-for="type in residenceProjectTypes" :key="type.id">
                                        <option :value="type.id" x-text="type.name"></option>
                                    </template>
                                </select>
                                <label class="block text-gray-600 dark:text-gray-300 mt-4 mb-1" for="caracter">Carácter del Proyecto</label>
                                <select id="caracter" x-model="selectedNature" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                                    <option>Selecciona una opción</option>
                                    <template x-for="nature in residenceNatures" :key="nature.id">
                                        <option :value="nature.id" x-text="nature.name"></option>
                                    </template>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-600 dark:text-gray-300 mb-1" for="ambito">Ámbito del Proyecto</label>
                                <select id="ambito" x-model="selectedAmbit" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                                    <option>Selecciona una opción</option>
                                    <template x-for="ambit in residenceAmbits" :key="ambit.id">
                                        <option :value="ambit.id" x-text="ambit.name"></option>
                                    </template>
                                    </select>

                                    <label class="block text-gray-600 dark:text-gray-300 mt-4 mb-1" for="kind">Clase de Proyecto</label>
                                    <select id="clase" name="id_kind" x-model="selectedKind" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                                        <option>Selecciona una opción</option>
                                        <template x-for="kind in residenceKinds" :key="kind.id">
                                            <option :value="kind.id" x-text="kind.name"></option>
                                        </template>
                                    </select>
                                    <label class="block text-gray-600 dark:text-gray-300 mt-4 mb-1" for="carrera">Carrera</label>
                                    <select id="carrera" name="id_carrera" x-model="selectedCareer" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm">
                                        <option>Selecciona una opción</option>
                                        <template x-for="career in personCareer" :key="career.id">
                                            <option :value="career.id" x-text="career.name"></option>
                                        </template>
                                    </select>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button 
                                @click="section = 'justification'" 
                                class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600">
                                Siguiente
                            </button>
                        </div>
                    </div>

                    <!-- Justificación -->
                    <div x-show="section === 'justification'" x-cloak>
                        <div class="mb-4">
                            <label class="block text-gray-600 dark:text-gray-300 mb-1" for="justificacion">Justificación</label>
                            <textarea id="justificacion" rows="4" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 dark:text-gray-300 mb-1" for="actividades">Actividades</label>
                            <textarea id="actividades" rows="3" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="flex justify-between mt-4">
                            <button 
                                @click="section = 'info'" 
                                class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600">
                                Anterior
                            </button>
                            <button 
                                @click="section = 'comments'" 
                                class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600">
                                Siguiente
                            </button>
                        </div>
                    </div>

                    <!-- Comentarios -->
                    <div x-show="section === 'comments'" x-cloak>
                        <div class="mb-4">
                            <label class="block text-gray-600 dark:text-gray-300 mb-1" for="comentarios">Comentarios Adicionales</label>
                            <textarea id="comentarios" rows="4" class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 rounded-md shadow-sm"></textarea>
                        </div>
                        <div class="flex justify-between mt-4">
                            <button 
                                @click="section = 'justification'" 
                                class="bg-gray-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-gray-600">
                                Anterior
                            </button>
                            <button 
                                class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600"
                                onclick="saveProject()">
                                Enviar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Función para mostrar/ocultar el modal
        function toggleModal(show) {
            const modal = document.getElementById('modalProyecto');
            modal.classList.toggle('hidden', !show);
        }

        // Evento para cerrar el modal con la tecla Escape
        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                toggleModal(false);
            }
        });

        // Evento para abrir el modal
        document.addEventListener('DOMContentLoaded', function() {
            const button = document.getElementById('abrirModal');
            if (button) {
                button.addEventListener('click', function() {
                    toggleModal(true);
                });
            }
        });

        // Función para enviar el formulario
        document.addEventListener('DOMContentLoaded', function() {
            const residenceProjectForm = document.getElementById('residenceProjectForm');
            if (residenceProjectForm) {
                residenceProjectForm.addEventListener('submit', async (e) => {
                    e.preventDefault();

                    const formData = new FormData(e.target);
                    const data = Object.fromEntries(formData);

                    const response = await fetch('/residence-projects', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify(data),
                    });

                    if (response.ok) {
                        alert('Proyecto registrado con éxito.');
                    } else {
                        alert('Ocurrió un error.');
                    }
                });
            }
        });

        async function saveProject() {
            const tipo = document.getElementById('tipo');
            const empresa = document.getElementById('empresa');
            const caracter = document.getElementById('caracter');
            const ambito = document.getElementById('ambito');
            const clase = document.getElementById('clase');
            const carrera = document.getElementById('carrera');
            const titulo = document.getElementById('titulo');
            const general = document.getElementById('general');
            const objetivos = document.getElementById('objetivos');
            const justificacion = document.getElementById('justificacion');
            const actividades = document.getElementById('actividades');
            const comentarios = document.getElementById('comentarios');

            if (!tipo || !empresa || !caracter || !ambito || !clase || !carrera || !titulo || !general || !objetivos || !justificacion || !actividades || !comentarios) {
                console.error('Uno o más elementos no se encontraron en el DOM.');
                alert('Ocurrió un error al obtener los datos del formulario.');
                return;
            }

            const formData = {
                id_project_type: tipo.value,
                id_company: empresa.value,
                id_nature: caracter.value,
                id_ambit: ambito.value,
                id_kind: clase.value,
                id_project_phase: 1, // Ajustar según el flujo de tu aplicación
                titulo: titulo.value,
                objetivo_general: general.value,
                objetivos_especificos: objetivos.value,
                justificacion: justificacion.value,
                actividades: actividades.value,
                comentarios: comentarios.value || null,
                active: true, // Cambiar si necesitas un estado inicial diferente
                id_career: carrera.value,
                control_number: '{{ Auth::user()->control_number }}', // Incluye el control_number del usuario autenticado
            };

            console.log('Datos del formulario:', formData); // Registro de depuración

            try {
                const response = await fetch('/residence-projects', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify(formData),
                });

                if (!response.ok) {
                const errorData = await response.json();
                console.error('Error details:', errorData);
                throw new Error('Error al guardar el proyecto: ' + errorData.details);
            }

            const data = await response.json();
            alert(data.message);
            location.reload();
        } catch (error) {
            console.error(error);
            alert('Ocurrió un error al guardar el proyecto: ' + error.message);
        }
    }


    async function fetchUserProjects() {
            try {
                const response = await fetch('/get-user-projects');
                const data = await response.json();

                console.log('Proyectos devueltos:', data);

                if (data.error) {
                    throw new Error(data.error);
                }

                const projectsContainer = document.getElementById('user-projects');
                if (projectsContainer) {
                    projectsContainer.innerHTML = data.projects.map(project => `
                        <div>
                            ${project.titulo} - ${project.company_name}
                        </div>
                    `).join('');
                } else {
                    console.error('El contenedor no se encontró en el DOM');
                }
            } catch (error) {
                console.error('Error al obtener los proyectos:', error);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchUserProjects();
        });

    </script>
</body>
