<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Coordinador Gestión Empresarial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">

                <!-- Botones de filtros y barra de búsqueda -->
                <div class="mb-6 flex items-center">
                    <div class="flex space-x-4">
                        <button 
                            class="px-4 py-2 text-white rounded-md border border-white filter-btn" 
                            data-filter="pendientes">
                            Pendientes de Autorización
                        </button>
                        <button 
                            class="px-4 py-2 text-white rounded-md border border-white filter-btn" 
                            data-filter="vigentes">
                            Pendientes Vigentes
                        </button>
                        <button 
                            class="px-4 py-2 text-white rounded-md border border-white filter-btn" 
                            data-filter="finalizados">
                            Proyectos Finalizados
                        </button>
                    </div>
                    <!-- Barra de búsqueda de proyectos -->
                    <div class="flex items-center ml-auto w-1/3 justify-end">
                        <input 
                            type="text" 
                            id="search-project" 
                            name="search-project" 
                            placeholder="Buscar proyecto..." 
                            class="block w-full pl-3 pr-10 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200">
                        <button id="search-project-btn" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Buscar por docente -->
                <div class="mb-6">
                    <label for="search-docente" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Buscar por Docente:
                    </label>
                    <div class="flex">
                        <input 
                            type="text" 
                            id="search-docente" 
                            name="search-docente" 
                            placeholder="Ingresa el nombre del docente" 
                            class="flex-grow block w-full pl-3 pr-10 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200">
                        <button id="search-btn" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                            Buscar
                        </button>
                    </div>
                </div>

                <!-- Tabla de proyectos -->
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre del Maestro</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre del Alumno</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre del Proyecto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="project-table" class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Fila de ejemplo -->
                            <tr data-status="vigentes">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Maestro 1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Alumno 1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Proyecto 1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">Vigente</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2">✔</button>
                                    <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">✖</button>
                                </td>
                            </tr>
                            <tr data-status="finalizados">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Maestro 2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Alumno 2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">Proyecto 2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">Finalizado</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    <button class="px-3 py-1 bg-green-500 text-white rounded-md hover:bg-green-600 mr-2">✔</button>
                                    <button class="px-3 py-1 bg-red-500 text-white rounded-md hover:bg-red-600">✖</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Apartado para enviar comentario -->
                <div id="comments-section" class="mt-6">
                    <label for="comentario" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Enviar Comentario:
                    </label>
                    <textarea 
                        id="comentario" 
                        name="comentario" 
                        rows="4" 
                        placeholder="Escribe tu comentario aquí..." 
                        class="block w-full pl-3 pr-10 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm dark:bg-gray-700 dark:text-gray-200"></textarea>
                    <button class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Enviar</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Filtrar por estado
        document.querySelectorAll('.filter-btn').forEach(button => {
            button.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(btn => {
                    btn.classList.remove('bg-blue-800', 'text-white');
                    btn.classList.add('text-white', 'border-white');
                });
                button.classList.add('bg-blue-800', 'text-white');
                button.classList.remove('border-white');

                const filter = button.getAttribute('data-filter');
                const rows = document.querySelectorAll('#project-table tr');
                rows.forEach(row => {
                    if (row.getAttribute('data-status') === filter) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Cambiar el texto del apartado de comentarios
                const commentsSection = document.getElementById('comments-section');
                if (filter === 'vigentes') {
                    commentsSection.querySelector('label').textContent = 'Enviar comentario para Proyectos Vigentes:';
                } else if (filter === 'finalizados') {
                    commentsSection.querySelector('label').textContent = 'Enviar comentario para Proyectos Finalizados:';
                } else {
                    commentsSection.querySelector('label').textContent = 'Enviar comentario para Proyectos Pendientes de Autorización:';
                }
            });
        });

        // Buscar por docente
        document.getElementById('search-btn').addEventListener('click', () => {
            const query = document.getElementById('search-docente').value.toLowerCase();
            const rows = document.querySelectorAll('#project-table tr');
            rows.forEach(row => {
                const docente = row.querySelector('td:nth-child(1)').textContent.toLowerCase();
                if (docente.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Buscar por proyecto
        document.getElementById('search-project-btn').addEventListener('click', () => {
            const query = document.getElementById('search-project').value.toLowerCase();
            const rows = document.querySelectorAll('#project-table tr');
            rows.forEach(row => {
                const proyecto = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                if (proyecto.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-app-layout>