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

                        <!-- Botones del menú -->
                        <div class="space-x-4 mb-6">
                            <button id="btn-usuarios" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                Usuarios
                            </button>
                            <button id="btn-roles" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-600">
                                Roles
                            </button>
                            <button id="btn-permisos" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">
                                Permisos
                            </button>
                            <button id="btn-agregar" class="bg-purple-500 text-white py-2 px-4 rounded hover:bg-purple-600">
                                 + Agregar
                            </button>
                        </div>
                        <!-- Botón Agregar Nuevo Registro -->
                    
                        <!-- Buscador -->
                        <div class="mb-4">
                            <input type="text" id="search" class="p-2 border border-gray-300 rounded w-full" placeholder="Buscar proyecto...">
                        </div>


                        <!-- Contenedor dinámico -->
                        <div id="content-container" class="bg-gray-100 dark:bg-gray-700 p-4 rounded shadow">
                            <p class="text-center text-gray-600 dark:text-gray-300">Selecciona una opción del menú para ver la información.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
<div id="modal-crear-usuario" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">
    <div class="bg-white rounded-lg w-96 p-6">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password --> 
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ya estas registrado?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarse') }}
            </x-primary-button>
        </div>
    </form>



<script>
    document.addEventListener('DOMContentLoaded', () => {
        const nameInput = document.getElementById('name'); // Campo de nombre
        const emailInput = document.getElementById('email'); // Campo de correo
        const domain = '@matehuala.tecnm.mx';

        // Evento para actualizar el correo automáticamente
        nameInput.addEventListener('input', () => {
            const nameValue = nameInput.value.trim(); // Obtener el valor del campo nombre
            if (nameValue) {
                emailInput.value = nameValue + domain; // Actualizar el campo de correo
            } else {
                emailInput.value = ''; // Limpiar el campo de correo si no hay nombre
            }
        });
    });
</script>
    </div>
</div>


    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // URLs de las APIs
        const usersApiUrl = '/api/users'; // Cambiar según corresponda
        const rolesApiUrl = '/api/roles';
        const permissionsApiUrl = '/api/permissions';

        // Selectores
        const btnAgregar = document.getElementById('btn-agregar');
        const btnUsuarios = document.getElementById('btn-usuarios');
        const btnRoles = document.getElementById('btn-roles');
        const btnPermisos = document.getElementById('btn-permisos');
        const contentContainer = document.getElementById('content-container');

        // Función para crear una tabla
        const createTable = (data, headers) => {
        const table = document.createElement('table');
        table.className = 'w-full border-collapse border border-gray-300 rounded-lg';

        // Crear encabezados
        const thead = document.createElement('thead');
        thead.className = 'bg-gray-200 dark:bg-gray-600 text-black dark:text-black';
        const headerRow = document.createElement('tr');
        headers.forEach(header => {
            const th = document.createElement('th');
            th.className = 'py-2 px-4 border border-gray-300';
            th.textContent = header;
            headerRow.appendChild(th);
        });

        // Agregar columna para acciones
        const thActions = document.createElement('th');
        thActions.className = 'py-2 px-4 border border-gray-300';
        thActions.textContent = 'Acciones';
        headerRow.appendChild(thActions);
        thead.appendChild(headerRow);
        table.appendChild(thead);

        // Crear filas
        const tbody = document.createElement('tbody');
        data.forEach(item => {
            const row = document.createElement('tr');

            // Crear columnas de datos
            Object.values(item).forEach((value, index) => {
                const td = document.createElement('td');
                td.className = 'py-2 px-4 border border-gray-300 text-center';

                // Verificar si es la columna de roles
                if (index === headers.indexOf('Roles')) {
                    td.innerHTML = value.map(role => `<span class="bg-blue-500 text-white py-1 px-2 rounded mr-1">${role.name}</span>`).join('');
                } else {
                    td.textContent = value;
                }

                row.appendChild(td);
            });

            // Crear acciones (editar/eliminar)
            const tdActions = document.createElement('td');
            tdActions.className = 'py-2 px-4 border border-gray-300 text-center';
            const btnEdit = document.createElement('button');
            btnEdit.textContent = 'Editar';
            btnEdit.className = 'bg-yellow-500 text-white py-1 px-2 rounded hover:bg-yellow-600 mr-2';
            btnEdit.onclick = () => alert(`Editar registro ID: ${item.id}`); // Ajustar lógica

            const btnDelete = document.createElement('button');
            btnDelete.textContent = 'Eliminar';
            btnDelete.className = 'bg-red-500 text-white py-1 px-2 rounded hover:bg-red-600';
            btnDelete.onclick = () => alert(`Eliminar registro ID: ${item.id}`); // Ajustar lógica

            tdActions.appendChild(btnEdit);
            tdActions.appendChild(btnDelete);
            row.appendChild(tdActions);

            tbody.appendChild(row);
        });
        table.appendChild(tbody);

        return table;
    };

        // Función para cargar y mostrar datos
        const loadData = async (url, headers) => {
            try {
                const response = await fetch(url);
                if (!response.ok) throw new Error('Error al cargar datos');
                const data = await response.json();
                return createTable(data, headers);
            } catch (error) {
                console.error(error);
                const errorMessage = document.createElement('p');
                errorMessage.className = 'text-red-500 text-center';
                errorMessage.textContent = 'Ocurrió un error al cargar los datos.';
                return errorMessage;
            }
        };

        // Manejo de clics en botones
        btnUsuarios.addEventListener('click', async () => {
            contentContainer.innerHTML = '<p class="text-center">Cargando usuarios...</p>';
            const table = await loadData(usersApiUrl, ['ID', 'Nombre', 'Email', 'Roles']);
            contentContainer.innerHTML = '';
            contentContainer.appendChild(table);
        });

        btnRoles.addEventListener('click', async () => {
            contentContainer.innerHTML = '<p class="text-center">Cargando roles...</p>';
            const table = await loadData(rolesApiUrl, ['ID', 'Nombre']);
            contentContainer.innerHTML = '';
            contentContainer.appendChild(table);
        });

        btnPermisos.addEventListener('click', async () => {
            contentContainer.innerHTML = '<p class="text-center">Cargando permisos...</p>';
            const table = await loadData(permissionsApiUrl, ['ID', 'Nombre']);
            contentContainer.innerHTML = '';
            contentContainer.appendChild(table);
        });

        // Manejo del botón Agregar
        btnAgregar.addEventListener('click', () => {
            alert('Agregar nuevo registro'); // Aquí puedes redirigir o abrir un formulario modal
        });

    const modalCrearUsuario = document.getElementById('modal-crear-usuario');
    const formCrearUsuario = document.getElementById('form-crear-usuario');
    const btnCancelar = document.getElementById('btn-cancelar');
    const roleSelect = document.getElementById('role');
    const permissionSelect = document.getElementById('permission');


    const createUserApiUrl = '/api/users';

    // Abrir modal
    btnAgregar.addEventListener('click', () => {
    modalCrearUsuario.classList.remove('hidden');
    modalCrearUsuario.classList.add('flex');
    cargarRolesYPermisos(); // Esto carga los datos al abrir el modal
});

    // Cerrar modal
        modalCrearUsuario.classList.add('hidden');
        modalCrearUsuario.classList.remove('flex');
        modalCrearUsuario.classList.add('hidden');
    });

    // Cargar roles y permisos en los selectores
    const cargarRolesYPermisos = async () => {
        try {
            const [rolesResponse, permissionsResponse] = await Promise.all([
                fetch(rolesApiUrl),
                fetch(permissionsApiUrl)
            ]);

            if (!rolesResponse.ok || !permissionsResponse.ok) throw new Error('Error al cargar datos');

            const roles = await rolesResponse.json();
            const permissions = await permissionsResponse.json();

            roleSelect.innerHTML = roles.map(role => `<option value="${role.name}">${role.name}</option>`).join('');
            permissionSelect.innerHTML = permissions.map(permission => `<option value="${permission.name}">${permission.name}</option>`).join('');
        } catch (error) {
            console.error('Error al cargar roles y permisos:', error);
        }
    };

    // Manejo del formulario de creación
    formCrearUsuario.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(formCrearUsuario);
        const userData = {
            name: formData.get('name'),
            email: formData.get('email'),
            password: formData.get('password'),
            role: formData.get('role'),
            permission: formData.get('permission'),
        };

        try {
            const response = await fetch(createUserApiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(userData),
            });

            if (!response.ok) throw new Error('Error al crear usuario');

            alert('Usuario creado con éxito');
            modalCrearUsuario.classList.add('hidden');
            formCrearUsuario.reset();
        } catch (error) {
            console.error('Error al crear usuario:', error);
            alert('Hubo un error al crear el usuario');
        }
    });

    // Manejo del botón Cancelar
    btnCancelar.addEventListener('click', () => {
        modalCrearUsuario.classList.add('hidden');
        formCrearUsuario.reset();
    });


    const btnAgregar = document.getElementById('btn-agregar');
    const modalCrearUsuario = document.getElementById('modal-crear-usuario');
    const formCrearUsuario = document.getElementById('form-crear-usuario');
    const roleSelect = document.getElementById('role');
    const permissionSelect = document.getElementById('permission');
    const btnCancelar = document.getElementById('btn-cancelar');


    document.addEventListener('DOMContentLoaded', () => {
    // Declaración de URLs de las APIs
    const usersApiUrl = '/api/users';
    const rolesApiUrl = '/api/roles';
    const permissionsApiUrl = '/api/permissions';

    // Declaración de variables y selectores
    const btnAgregar = document.getElementById('btn-agregar');
    const modalCrearUsuario = document.getElementById('modal-crear-usuario');
    const formCrearUsuario = document.getElementById('form-crear-usuario');
    const roleSelect = document.getElementById('role');
    const permissionSelect = document.getElementById('permission');
    const btnCancelar = document.getElementById('btn-cancelar');

    // Abrir modal y cargar roles y permisos
    btnAgregar.addEventListener('click', () => {
        modalCrearUsuario.classList.remove('hidden');
        modalCrearUsuario.classList.add('flex');
        cargarRolesYPermisos();
    });

    // Cerrar modal
    btnCancelar.addEventListener('click', () => {
        modalCrearUsuario.classList.add('hidden');
        modalCrearUsuario.classList.remove('flex');
    });

    // Cargar roles y permisos
    const cargarRolesYPermisos = async () => {
        try {
            const [rolesResponse, permissionsResponse] = await Promise.all([
                fetch(rolesApiUrl),
                fetch(permissionsApiUrl),
            ]);

            if (!rolesResponse.ok || !permissionsResponse.ok) {
                throw new Error('Error al cargar datos');
            }

            const roles = await rolesResponse.json();
            const permissions = await permissionsResponse.json();

            roleSelect.innerHTML = roles.map(role => `<option value="${role.name}">${role.name}</option>`).join('');
            permissionSelect.innerHTML = permissions.map(permission => `<option value="${permission.name}">${permission.name}</option>`).join('');
        } catch (error) {
            console.error('Error al cargar roles y permisos:', error);
        }
    };

    // Manejo del formulario de creación
    formCrearUsuario.addEventListener('submit', async (event) => {
        event.preventDefault();

        const formData = new FormData(formCrearUsuario);
        const userData = {
            name: formData.get('name'),
            email: formData.get('email'),
            password: formData.get('password'),
            role: formData.get('role'),
            permission: formData.get('permission'),
        };

        try {
            const response = await fetch(usersApiUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(userData),
            });

            if (!response.ok) {
                throw new Error('Error al crear usuario');
            }

            alert('Usuario creado con éxito');
            modalCrearUsuario.classList.add('hidden');
            formCrearUsuario.reset();
        } catch (error) {
            console.error('Error al crear usuario:', error);
            alert('Hubo un error al crear el usuario');
        }
    });
});

</script>

