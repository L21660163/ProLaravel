<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyectos del Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Contenedor para mostrar los proyectos del usuario -->
    <div id="projects-container" class="text-center">
        <!-- Los proyectos se insertarán aquí -->
    </div>

<!-- Modal para subir archivos -->
<div class="fixed inset-0 z-50 hidden justify-center items-center bg-black bg-opacity-50" id="uploadModal">
      <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 sm:p-8 w-96 animate-fadeIn">
        <span class="absolute top-2 right-2 text-gray-500 cursor-pointer text-xl" onclick="closeModal()">&times;</span>
        <h2 class="text-2xl font-semibold text-center mb-4 text-gray-800">Subir Reporte Preliminar</h2>
        <form id="uploadForm" enctype="multipart/form-data" class="space-y-4">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- Aquí se incluye el token CSRF -->
          <input type="hidden" id="projectId" name="id_project">
          <input type="file" name="file" id="fileInput" required class="w-full border border-gray-300 p-2 rounded">
          <button type="submit" class="w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded">Subir Archivo</button>
        </form>
      </div>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", async function() {
  try {
    const response = await fetch('/get-user-projects');
    const result = await response.json();

    if (response.ok && result.projects) {
      const container = document.getElementById('projects-container');
      if (!container) {
        console.error('El contenedor no se encontró en el DOM');
        return;
      }
      result.projects.forEach(async project => {
        const div = document.createElement('div');
        div.className = 'bg-cover bg-no-repeat bg-center bg-[url("https://img.freepik.com/premium-vector/blue-diagonal-lines-blue-background_322958-3841.jpg")] shadow-lg rounded-xl w-[800px] h-[500px] p-8 border-t-4 border-indigo-500 flex flex-col justify-between items-center mx-auto mt-4';

        // Verificar si ya existe un archivo subido para el proyecto
        let buttonHtml = '';
        try {
          const fileResponse = await fetch(`/projects/${project.id}/files`);
          if (fileResponse.ok) {
            const fileResult = await fileResponse.json();
            if (fileResult.files && fileResult.files.length > 0) {
              const fileUrl = `/uploads/${fileResult.files[0].ruta}`;
              buttonHtml = `
                <button
  onclick="viewReport(${fileResult.files[0].id})"
  class="hover:bg-indigo-300 text-indigo-600 font-medium py-3 px-8 rounded-lg shadow-lg transition duration-300 mt-4">
  Ver Reporte Preliminar
</button>
              `;
            } else {
              buttonHtml = `
                <button
                onclick="openModal(${project.id})"
                class="hover:bg-indigo-300 text-indigo-600 font-medium py-3 px-8 rounded-lg shadow-lg transition duration-300 mt-4">
                Subir Reporte Preliminar
              </button>
              `;
            }
          } else {
            buttonHtml = `
              <button
              onclick="openModal(${project.id})"
              class="hover:bg-indigo-300 text-indigo-600 font-medium py-3 px-8 rounded-lg shadow-lg transition duration-300 mt-4">
              Subir Reporte Preliminar
            </button>
            `;
          }
        } catch (error) {
          console.error('Error al verificar los archivos del proyecto:', error);
          buttonHtml = `
            <button
            onclick="openModal(${project.id})"
            class="hover:bg-indigo-300 text-indigo-600 font-medium py-3 px-8 rounded-lg shadow-lg transition duration-300 mt-4">
            Subir Reporte Preliminar
          </button>
          `;
        }

        div.innerHTML = `
          <div class="flex flex-col items-center mt-6">
            <h2 class="text-3xl font-bold text-gray-300 text-center mb-6">${project.company_name}</h2>
            <p class="text-xl text-gray-500 text-center mb-2"> <span class="font-bold text-gray-400">EN ESPERA</span></p>
            <p class="text-xl text-gray-500 text-center mb-2"> <span class="font-bold text-orange-400">${project.titulo}</span></p>
            <p class="text-xl text-gray-500 text-center mb-4">Creado: <span class="text-gray-400">${project.created_at}</span></p>
            
            ${buttonHtml}

            <!-- Barra de progreso con 6 etapas -->
            <div class="flex justify-between items-center mt-4 w-4/5 bg-gray-200 rounded-full px-1 py-1">
              ${getProgressBar(project.id_project_phase)}
            </div>
          </div>
          
          <p class="text-xl text-gray-500 text-center mb-2">Integrantes: <span class="text-gray-400">${project.person_name}</span></p>
        `;
        container.appendChild(div);
      });
    } else {
      console.error('Error al cargar los proyectos del usuario');
    }
  } catch (error) {
    console.error('Hubo un error en la solicitud AJAX:', error);
  }
});

function getProgressBar(phase) {
  const phases = [2, 3, 7, 8, 11, 14];
  let progressBar = '';

  for (let i = 0; i < 6; i++) {
    if (phase >= phases[i]) {
      progressBar += '<div class="bg-green-500 w-4 h-4 rounded mx-1"></div>';
    } else {
      progressBar += '<div class="bg-gray-500 w-4 h-4 rounded mx-1"></div>';
    }
  }

  return progressBar;
}


// Funcionalidad para ver el reporte preliminar
function viewReport(fileId) {
  const url = `/files/view/${fileId}`;
  window.open(url, '_blank');
}


/// Funcionalidad para abrir el modal
function openModal(projectId) {
  const modal = document.getElementById('uploadModal');
  modal.classList.remove('hidden');
  modal.classList.add('flex');
  document.getElementById('projectId').value = projectId; // Guardar el ID dinámicamente en el formulario
}

// Funcionalidad para cerrar el modal
function closeModal() {
  const modal = document.getElementById('uploadModal');
  modal.classList.add('hidden');
  modal.classList.remove('flex');
}

// Funcionalidad para ver el reporte preliminar
function viewReport(fileId) {
  const url = `/files/view/${fileId}`;  // Construimos la URL completa
  window.location.href = url; // Redirige al navegador a la URL completa
}

// Manejo de envío de formulario
document.getElementById('uploadForm')?.addEventListener('submit', async function(e) {
  e.preventDefault();

  const fileInput = document.getElementById('fileInput');
  const projectIdInput = document.getElementById('projectId');

  if (!fileInput.files[0]) {
    alert('Por favor selecciona un archivo para subir.');
    return;
  }

  const formData = new FormData();
  formData.append('file', fileInput.files[0]);
  formData.append('id_project', projectIdInput.value);

  const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

  try {
    const response = await fetch('/upload-file', {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': token
      },
      body: formData
    });

    if (!response.ok) {
      throw new Error(`Error: ${response.status}`);
    }

    const result = await response.json();
    alert('Archivo subido con éxito');
    closeModal();
  } catch (error) {
    console.error('Hubo un error en la solicitud AJAX:', error);
  }
});
</script>


<style>
@tailwind base;
@tailwind components;
@tailwind utilities;

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

.animate-fadeIn {
  animation: fadeIn 0.3s ease;
}

.progress-bar div {
  margin-right: 0.5rem; /* Espaciado entre puntos */
}
</style>
