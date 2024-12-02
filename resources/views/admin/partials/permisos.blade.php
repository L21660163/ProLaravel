<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Gestión de Permisos') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Aquí puedes gestionar los permisos, editarlos o eliminarlos.') }}
        </p>
    </header>

    <!-- Botón para agregar un nuevo rol -->
    <button class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
        {{ __('+ Agregar Permiso') }}
    </button>

    <div class="mt-6 space-y-6">
        <!-- Lista de Roles -->
            <div class="flex items-center justify-between p-4 border rounded-md bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <p class="text-lg font-medium text-gray-900 dark:text-gray-100"></p>
                    <p class="text-sm text-gray-600 dark:text-gray-400"></p>
                </div>

                <div class="flex space-x-4">
                    <!-- Botón de Editar Rol -->
                    <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600" >
                        {{ __('Editar') }}
                    </button>

                    <!-- Botón de Eliminar Rol -->
                    <form >
                  
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            {{ __('Eliminar') }}
                        </button>
                    </form>

                    <!-- Botón de Asignar Permisos -->
                    <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700" >
                        {{ __('Asignar Permisos') }}
                    </button>

                    <!-- Botón de Quitar Permisos -->
                    <button class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700" >
                        {{ __('Quitar Permisos') }}
                    </button>
                </div>
            </div>

    </div>
</section>

<!-- Modal para editar rol -->
<div id="editRoleModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center" style="display: none;">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h3 class="text-xl font-semibold text-gray-900">Editar Permiso</h3>
        <form  method="POST" id="editRoleForm">
          
            <div class="mt-4">
                <label for="roleName" class="block text-sm font-medium text-gray-700">Nombre del Rol</label>
                <input type="text" id="roleName" name="roleName" class="mt-1 block w-full px-3 py-2 border rounded-md" >
            </div>
            <div class="mt-4">
                <label for="roleDescription" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="roleDescription" name="roleDescription" class="mt-1 block w-full px-3 py-2 border rounded-md"></textarea>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    {{ __('Actualizar Rol') }}
                </button>
            </div>
        </form>
        <button onclick="closeEditRoleModal()" class="mt-4 text-sm text-gray-500">Cerrar</button>
    </div>
</div>

<!-- Modal para asignar permisos -->
<div id="assignPermissionsModal" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h3 class="text-xl font-semibold text-gray-900">Asignar Permisos</h3>
        <form >
            
            <div class="mt-4">
                <label for="permissions" class="block text-sm font-medium text-gray-700">Seleccionar Permisos</label>
                <select id="permissions" name="permissions[]" multiple class="mt-1 block w-full px-3 py-2 border rounded-md">
                    
                        <option></option>
                    
                </select>
            </div>
            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                    {{ __('Asignar Permisos') }}
                </button>
            </div>
        </form>
        <button onclick="closeAssignPermissionsModal()" class="mt-4 text-sm text-gray-500">Cerrar</button>
    </div>
</div>

