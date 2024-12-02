<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Administrador') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <!-- Main Content -->
            <div class="w-full">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Panel de Administración</h3>
                        
                        <!-- Buscador -->
                        <div class="mb-4">
                            <input type="text" class="p-2 border border-gray-300 rounded w-full" placeholder="Buscar...">
                        </div>

                        <!-- Botones de Gestión -->
                        <div class="space-x-4 mb-6">
                            <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Gestionar Usuarios</button>
                            <button class="bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600">Gestionar Roles</button>
                            <button class="bg-teal-500 text-white py-2 px-4 rounded hover:bg-teal-600">Gestionar Permisos</button>
                            <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Gestionar Proyectos</button>
                        </div>

                        <!-- Sección de Estadísticas -->
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div class="bg-blue-100 dark:bg-blue-700 p-4 rounded shadow">
                                <h4 class="font-semibold text-blue-800 dark:text-blue-200">Usuarios Totales</h4>
                                <p class="text-2xl font-bold">350</p>
                            </div>
                            <div class="bg-green-100 dark:bg-green-700 p-4 rounded shadow">
                                <h4 class="font-semibold text-green-800 dark:text-green-200">Proyectos Activos</h4>
                                <p class="text-2xl font-bold">45</p>
                            </div>
                            <div class="bg-yellow-100 dark:bg-yellow-700 p-4 rounded shadow">
                                <h4 class="font-semibold text-yellow-800 dark:text-yellow-200">Roles Definidos</h4>
                                <p class="text-2xl font-bold">12</p>
                            </div>
                            <div class="bg-red-100 dark:bg-red-700 p-4 rounded shadow">
                                <h4 class="font-semibold text-red-800 dark:text-red-200">Permisos Pendientes</h4>
                                <p class="text-2xl font-bold">8</p>
                            </div>
                        </div>

                        <!-- Tabla de Proyectos -->
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold mb-4">Proyectos Recientes</h3>
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="bg-gray-200 dark:bg-gray-700">
                                        <th class="p-2 border-b dark:border-gray-600">Nombre</th>
                                        <th class="p-2 border-b dark:border-gray-600">Estado</th>
                                        <th class="p-2 border-b dark:border-gray-600">Última Modificación</th>
                                        <th class="p-2 border-b dark:border-gray-600">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="p-2 border-b dark:border-gray-600">Proyecto A</td>
                                        <td class="p-2 border-b dark:border-gray-600 text-blue-500">En Revisión</td>
                                        <td class="p-2 border-b dark:border-gray-600">2024-11-20</td>
                                        <td class="p-2 border-b dark:border-gray-600">
                                            <button class="bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Editar</button>
                                            <button class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Eliminar</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="p-2 border-b dark:border-gray-600">Proyecto B</td>
                                        <td class="p-2 border-b dark:border-gray-600 text-green-500">Vigente</td>
                                        <td class="p-2 border-b dark:border-gray-600">2024-11-18</td>
                                        <td class="p-2 border-b dark:border-gray-600">
                                            <button class="bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600">Editar</button>
                                            <button class="bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lateral Derecho -->
            <div class="w-1/4 hidden lg:block">
                <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded shadow">
                    <h4 class="font-semibold mb-4 text-gray-800 dark:text-gray-200">Notificaciones</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-600 dark:text-gray-400">Nuevo usuario registrado.</li>
                        <li class="text-gray-600 dark:text-gray-400">Proyecto aprobado: "Sistema X".</li>
                        <li class="text-gray-600 dark:text-gray-400">Permiso pendiente para el usuario "Juan".</li>
                    </ul>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.user')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.roles')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.permisos')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
