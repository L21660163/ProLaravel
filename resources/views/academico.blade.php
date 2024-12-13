<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jefe Academico') }}
        </h2>
    </x-slot>

    <!-- Contenedor de tarjetas con ajuste horizontal -->
    <div id="projects-container" class="flex flex-wrap gap-6 p-4">
        <!-- Aquí se generarán las tarjetas de forma dinámica -->
    </div>

    <script>
        // Obtén los proyectos desde el backend usando una solicitud Fetch
        fetch('/projects/phase/2')
            .then(response => response.json())
            .then(data => {
                if (data.projects && data.projects.length > 0) {
                    const projectsContainer = document.getElementById('projects-container');
                    
                    // Colores dinámicos para cada tarjeta
                    const colors = ['bg-green-500', 'bg-blue-500', 'bg-yellow-500', 'bg-red-500', 'bg-purple-500'];
                    
                    // Itera sobre cada proyecto y genera una tarjeta
                    data.projects.forEach((project, index) => {
                        const colorClass = colors[index % colors.length];  // Asigna un color de manera cíclica
                        
                        // Crear el div para la tarjeta
                        const card = document.createElement('div');
                        card.className = `bg-cover shadow-lg rounded-lg p-4 min-h-[300px] max-h-[400px] justify-between items-center border-t-4 border-indigo-500 overflow-hidden w-full sm:w-1/2 md:w-1/3 ${colorClass}`;  // Color dinámico para la tarjeta
                        card.style.backgroundImage = "url('https://img.freepik.com/premium-vector/blue-diagonal-lines-blue-background_322958-3841.jpg')";
                        card.style.backgroundSize = 'cover';
                        card.style.backgroundPosition = 'center';
                        
                        // Crear el contenido de la tarjeta
                        card.innerHTML = `
                            <div class="flex flex-col justify-center items-center text-center text-white">
                                <!-- Título del proyecto con color dinámico -->
                                <h3 class="text-lg font-semibold mb-2 text-${colorClass.split('-')[1]}-200">${project.titulo}</h3>
                                <!-- Nombre de la empresa con color dinámico -->
                                <p class="text-3xl font-bold text-gray-300 text-center mb-6">${project.company_name}</p>
                                <!-- Fecha con color dinámico -->
                                <p class="text-xs mt-2 text-${colorClass.split('-')[1]}-200">${project.created_at}</p>
                                <!-- Botón Ver Reporte Preliminar -->
                                <button class="mt-2 px-4 py-2 bg-${colorClass.split('-')[1]}-700 text-white rounded-full hover:bg-${colorClass.split('-')[1]}-800 transition-all">
                                    Ver Reporte Preliminar
                                </button>
                                <!-- Botones circulares con íconos -->
                                <div class="flex space-x-6 mt-4"> <!-- Mayor espacio entre los botones -->
                                    <!-- Botón Aceptar con color dinámico -->
                                    <button class="w-12 h-12 bg-gray-400 text-white rounded-full flex items-center justify-center hover:bg-${colorClass.split('-')[1]}-700 transition-all" onclick="updateProjectPhase(${project.id})">
                                        <!-- Ícono de Palomita (Check) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </button>
                                    <!-- Botón Rechazar con color dinámico -->
                                    <button class="w-12 h-12 bg-${colorClass.split('-')[1]}-600 text-white rounded-full flex items-center justify-center hover:bg-${colorClass.split('-')[1]}-700 transition-all" onclick="updateProjectPhaseReject(${project.id})">
                                        <!-- Ícono de Tacha (X) -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        `;
                        
                        // Agregar la tarjeta al contenedor
                        projectsContainer.appendChild(card);
                    });
                } else {
                    const noProjectsMessage = document.createElement('p');
                    noProjectsMessage.textContent = "No se encontraron proyectos para esta carrera.";
                    document.getElementById('projects-container').appendChild(noProjectsMessage);
                }
            })
            .catch(error => {
                console.error("Error al cargar los proyectos:", error);
            });

        // Función para actualizar la fase del proyecto
        function updateProjectPhase(projectId) {
            fetch(`/projects/update-phase/${projectId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    id_project_phase: 3
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                } else {
                    alert('Error al actualizar la fase del proyecto.');
                }
            })
            .catch(error => {
                console.error("Error al actualizar la fase del proyecto:", error);
            });
        }

        // Función para actualizar la fase del proyecto a 1 (Rechazar)
        function updateProjectPhaseReject(projectId) {
    fetch(`/projects/update-phase/${projectId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            id_project_phase: 4 // Cambia la fase a 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message) {
            alert(data.message); // Muestra el mensaje de éxito
        } else {
            alert('Error al actualizar la fase del proyecto.');
        }
    })
    .catch(error => {
        console.error("Error al actualizar la fase del proyecto:", error);
    });
}
    </script>
</x-app-layout>
