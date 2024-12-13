<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('División de Estudios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Filtros y estadísticas -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">Estadísticas de Residencias | Total de Proyectos: </h3>

                    <!-- Botones de filtros -->
                    <div class="flex items-center justify-between space-x-4">
                        <div class="flex space-x-4">
                            <button onclick="toggleButton(this, 'activos')" class="px-4 py-2 border border-white text-white bg-blue-800 rounded hover:bg-blue-900">
                                Activos en Proceso
                            </button>
                            <button onclick="toggleButton(this, 'finalizados')" class="px-4 py-2 border border-white text-white bg-blue-800 rounded hover:bg-blue-900">
                                Finalizados
                            </button>
                            <button onclick="toggleButton(this, 'inactivos')" class="px-4 py-2 border border-white text-white bg-blue-800 rounded hover:bg-blue-900">
                                Inactivos
                            </button>
                        </div>
                        <!-- Filtro de búsqueda -->
                        <div class="flex space-x-2">
                            <input type="text" id="busqueda" placeholder="Buscar proyecto..." class="border border-gray-300 p-2 rounded text-black" />
                            <button onclick="buscarProyecto()" class="px-4 py-2 bg-blue-800 text-white rounded hover:bg-blue-900">
                                Buscar
                            </button>
                        </div>
                    </div>

                    <!-- Filtro por carrera -->
                    <div class="relative mt-4">
                        <label for="carrera" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Filtrar por Carrera
                        </label>
                        <select id="carrera" onchange="filtrarPorCarrera()" class="block w-full mt-1 p-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500 text-black">
                            <option value="">Selecciona una carrera</option>
                            <option value="CONTADOR PUBLICO">CONTADOR PÚBLICO</option>
                            <option value="INGENIERIA CIVIL">INGENIERÍA CIVIL</option>
                            <option value="INGENIERIA EN GESTION EMPRESARIAL">INGENIERÍA EN GESTIÓN EMPRESARIAL</option>
                            <option value="INGENIERIA INDUSTRIAL">INGENIERÍA INDUSTRIAL</option>
                            <option value="INGENIERIA EN SISTEMAS COMPUTACIONALES">INGENIERÍA EN SISTEMAS COMPUTACIONALES</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Contenido dinámico -->
            <div id="contenido" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Aquí se cargarán las secciones dinámicamente -->
            </div>
        </div>
    </div>

    <script>
        function toggleButton(button, seccion) {
            const botones = document.querySelectorAll('button');
            botones.forEach(btn => btn.classList.remove('bg-blue-900', 'text-white'));
            button.classList.add('bg-blue-900', 'text-white');

            mostrarSeccion(seccion);
        }

        function mostrarSeccion(seccion) {
            const contenido = document.getElementById('contenido');
            contenido.innerHTML = `<div class='col-span-3 p-4 bg-gray-100 dark:bg-gray-700 rounded'>
                <h4 class='text-lg font-semibold text-blue-600'>Sección: ${seccion}</h4>
                <p>Aquí se mostrarán los proyectos ${seccion}.</p>
            </div>`;
        }

        function filtrarPorCarrera() {
            const carrera = document.getElementById('carrera').value;
            const contenido = document.getElementById('contenido');

            if (carrera) {
                contenido.innerHTML = `
                    <div class='col-span-3 p-4 bg-gray-100 dark:bg-gray-700 rounded'>
                        <h4 class='text-lg font-semibold text-blue-600'>Carrera: ${carrera}</h4>
                        <table class='min-w-full border-collapse border border-gray-400'>
                            <thead class='bg-gray-200'>
                                <tr>
                                    <th class='border border-gray-400 px-4 py-2'>Nombre del Docente</th>
                                    <th class='border border-gray-400 px-4 py-2'>Nombre del Alumno</th>
                                    <th class='border border-gray-400 px-4 py-2'>Nombre del Proyecto</th>
                                    <th class='border border-gray-400 px-4 py-2'>Estado</th>
                                    <th class='border border-gray-400 px-4 py-2'>Acciones</th>
                                    <th class='border border-gray-400 px-4 py-2'>Comentarios</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='border border-gray-400 px-4 py-2'>Dr. Juan Pérez</td>
                                    <td class='border border-gray-400 px-4 py-2'>Ana López</td>
                                    <td class='border border-gray-400 px-4 py-2'>Optimización de Procesos</td>
                                    <td class='border border-gray-400 px-4 py-2'>En Proceso</td>
                                    <td class='border border-gray-400 px-4 py-2'>
                                        <button class='bg-green-500 text-white px-2 py-1 rounded'>✔</button>
                                        <button class='bg-red-500 text-white px-2 py-1 rounded'>✖</button>
                                    </td>
                                    <td class='border border-gray-400 px-4 py-2'>
                                        <input type='text' class='border border-gray-300 p-1 rounded' placeholder='Comentario' />
                                        <button class='bg-blue-500 text-white px-2 py-1 rounded ml-2'>Enviar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class='border border-gray-400 px-4 py-2'>Ing. María Gómez</td>
                                    <td class='border border-gray-400 px-4 py-2'>Carlos Hernández</td>
                                    <td class='border border-gray-400 px-4 py-2'>Automatización Industrial</td>
                                    <td class='border border-gray-400 px-4 py-2'>Finalizado</td>
                                    <td class='border border-gray-400 px-4 py-2'>
                                        <button class='bg-green-500 text-white px-2 py-1 rounded'>✔</button>
                                        <button class='bg-red-500 text-white px-2 py-1 rounded'>✖</button>
                                    </td>
                                    <td class='border border-gray-400 px-4 py-2'>
                                        <input type='text' class='border border-gray-300 p-1 rounded' placeholder='Comentario' />
                                        <button class='bg-blue-500 text-white px-2 py-1 rounded ml-2'>Enviar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `;
            } else {
                contenido.innerHTML = '<p class="text-gray-600">Selecciona una carrera para mostrar los proyectos.</p>';
            }
        }

        function buscarProyecto() {
            const busqueda = document.getElementById('busqueda').value;
            alert(`Buscando proyecto: ${busqueda}`);
            // Aquí puedes añadir lógica para filtrar proyectos en base a la búsqueda.
        }
    </script>
</x-app-layout>
