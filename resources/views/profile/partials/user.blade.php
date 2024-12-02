<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Gestión de Usuarios') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Aquí puedes gestionar los usuarios, asignarles roles, editarlos o eliminarlos.') }}
        </p>
    </header>

    <!-- Botón para agregar un nuevo usuario -->
    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
        {{ __('+ Agregar') }}
    </button>

    <div class="mt-6 space-y-6">
        <!-- Lista de Usuarios -->

            <div class="flex items-center justify-between p-4 border rounded-md bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $user->email }}</p>
                </div>

                <div class="flex space-x-4">
                    <!-- Botón de Editar -->
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600">
                        {{ __('Editar') }}
                    </button>

                    <!-- Botón de Eliminar -->
                    <form >
                        
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            {{ __('Eliminar') }}
                        </button>
                    </form>

                    <!-- Botón de Asignar Rol -->
                    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">
                        {{ __('Asignar Rol') }}
                    </button>

                    <!-- Botón de Quitar Rol -->
                    <button class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        {{ __('Quitar Rol') }}
                    </button>
                </div>
            </div>

    </div>
</section>
