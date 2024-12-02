<div id="modal-crear-usuario" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg w-96 p-6">
        <h3 class="text-lg font-semibold mb-4">Crear Usuario</h3>
        <form id="form-crear-usuario">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                <select id="role" name="role" class="mt-1 block w-full border-gray-300 rounded-md" required></select>
            </div>
            <div class="mb-4">
                <label for="permission" class="block text-sm font-medium text-gray-700">Permiso</label>
                <select id="permission" name="permission" class="mt-1 block w-full border-gray-300 rounded-md" required></select>
            </div>
            <div class="flex justify-end">
                <button type="button" id="btn-cancelar" class="bg-gray-500 text-white py-2 px-4 rounded mr-2">Cancelar</button>
                <button type="submit" class="bg-purple-500 text-white py-2 px-4 rounded">Crear</button>
            </div>
        </form>
    </div>
</div>