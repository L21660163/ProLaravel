<?php

namespace App\Http\Controllers;

use App\Models\ResidenceProject;
use App\Models\Project;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Person;
use App\Models\ResidenceProjectPerson;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\ProjectFile;
use App\Models\MyFileProject;
use PDO;

class ResidenceProjectController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_project_type' => 'required|integer',
            'id_company' => 'required|integer',
            'id_nature' => 'required|integer',
            'id_ambit' => 'required|integer',
            'id_kind' => 'required|integer',
            'id_project_phase' => 'required|integer',
            'titulo' => 'required|string|max:255',
            'objetivo_general' => 'required|string',
            'objetivos_especificos' => 'required|string',
            'justificacion' => 'required|string',
            'actividades' => 'required|string',
            'comentarios' => 'nullable|string',
            'active' => 'required|boolean',
            'id_career' => 'required|integer',
            'control_number' => 'required|string',

        ]);

        try {
            $project = ResidenceProject::create($validatedData);
            Log::info('Proyecto creado: ' . $project->id);

            return response()->json(['message' => 'Proyecto registrado con éxito', 'project' => $project], 201);
        } catch (\Illuminate\Database\QueryException $e) {
            Log::error('Error de base de datos al guardar el proyecto: ' . $e->getMessage());
            return response()->json(['error' => 'Error de base de datos al guardar el proyecto', 'details' => $e->getMessage()], 500);
        } catch (\Exception $e) {
            Log::error('Error al guardar el proyecto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al guardar el proyecto', 'details' => $e->getMessage()], 500);
        }
    }

    public function getUserProjects(Request $request)
    {
        try {
            // Obtén el usuario autenticado
            $user = \Illuminate\Support\Facades\Auth::user();
    
            if (!$user) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }
    
            // Obtén los proyectos relacionados al usuario directamente desde residence_project_persons
            $residenceProjectPersons = DB::table('residence_project_persons')
                ->where('control_number', $user->control_number)
                ->get();
    
            $hasProjects = !$residenceProjectPersons->isEmpty();
    
            $projects = [];
            if ($hasProjects) {
                // Obtén los IDs de los proyectos
                $projectIds = $residenceProjectPersons->pluck('id_project');
    
                // Obtén los proyectos y sus relaciones
                $projects = ResidenceProject::whereIn('id', $projectIds)
                    ->with('company')
                    ->get()
                    ->map(function ($project) use ($user) {
                        return [
                            'id' => $project->id,
                            'titulo' => $project->titulo,
                            'company_name' => $project->company ? $project->company->nombre : 'Sin compañía asociada',
                            'person_name' => $user->name,
                            'id_project_phase' => $project->id_project_phase,
                            'created_at' => $this->timeAgo($project->created_at),
                        ];
                    });
            }
    
            return response()->json(['projects' => $projects, 'hasProjects' => $hasProjects]);
        } catch (\Exception $e) {
            Log::error('Error al obtener los proyectos del usuario: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener los proyectos del usuario', 'details' => $e->getMessage()], 500);
        }
    }
    
    
    /**
     * Convierte la fecha de creación en una cadena legible como "hace X minutos/horas/días".
     *
     * @param string $date Fecha de creación del proyecto
     * @return string Cadena con el tiempo en formato "hace X tiempo".
     */
    private function timeAgo($date)
    {
        return Carbon::parse($date)->diffForHumans(); // Convierte fecha en formato humano
    }

    public function getProjectsByCareer(Request $request)
    {
        try {
            // Filtrar los proyectos con el id_career = 6
            $projects = ResidenceProject::where('id_career', 6)
                ->with('company')  // Si deseas obtener también la relación con la empresa
                ->get()
                ->map(function ($project) {
                    return [
                        'id' => $project->id,
                        'titulo' => $project->titulo,
                        'company_name' => $project->company ? $project->company->nombre : 'Sin compañía asociada',
                        'id_project_phase' => $project->id_project_phase,
                        'created_at' => $this->timeAgo($project->created_at), // Fecha en formato "hace X tiempo"
                    ];
                });
    
            // Si no se encontraron proyectos
            if ($projects->isEmpty()) {
                return response()->json(['error' => 'No se encontraron proyectos para la carrera de CN'], 404);
            }
    
            // Retornar los proyectos
            return response()->json(['projects' => $projects]);
        } catch (\Exception $e) {
            Log::error('Error al obtener proyectos de la carrera CN: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener los proyectos', 'details' => $e->getMessage()], 500);
        }
    }


    public function updateProjectPhase(Request $request, $id)
    {
        try {
            // Busca el proyecto por ID
            $project = ResidenceProject::findOrFail($id);
    
            // Verifica si el campo 'id_project_phase' está en la solicitud
            if ($request->has('id_project_phase')) {
                $project->id_project_phase = $request->input('id_project_phase');
                $project->save();
    
                return response()->json(['message' => 'Fase del proyecto actualizada correctamente', 'project' => $project], 200);
            } else {
                return response()->json(['error' => 'Falta el campo id_project_phase'], 400);
            }
        } catch (\Exception $e) {
            Log::error('Error al actualizar la fase del proyecto: ' . $e->getMessage());
            return response()->json(['error' => 'Error al actualizar la fase del proyecto', 'details' => $e->getMessage()], 500);
        }
    }
    
    public function getProjectsByPhase(Request $request)
{
    try {
        // Filtrar proyectos con id_project_phase = 2
        $projects = ResidenceProject::where('id_project_phase', 2)
            ->with('company') // Si necesitas cargar la relación con la compañía
            ->get()
            ->map(function ($project) {
                return [
                    'id' => $project->id,
                    'titulo' => $project->titulo,
                    'company_name' => $project->company ? $project->company->nombre : 'Sin compañía asociada',
                    'id_project_phase' => $project->id_project_phase,
                    'created_at' => $this->timeAgo($project->created_at), // Fecha en formato "hace X tiempo"
                ];
            });

        // Verificar si hay proyectos
        if ($projects->isEmpty()) {
            return response()->json(['error' => 'No se encontraron proyectos con la fase de proyecto 2'], 404);
        }

        // Retornar los proyectos
        return response()->json(['projects' => $projects], 200);
    } catch (\Exception $e) {
        Log::error('Error al obtener proyectos con la fase de proyecto 2: ' . $e->getMessage());
        return response()->json(['error' => 'Error al obtener proyectos', 'details' => $e->getMessage()], 500);
    }
}


public function uploadFile(Request $request)
    {
        $request->validate([
            'id_project' => 'required|integer|exists:residence_projects,id',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        try {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'uploads/' . $fileName;

            // Guardar el archivo en la base de datos
            $projectFile = ProjectFile::create([
                'id_project' => $request->id_project,
                'name' => $fileName,
                'ruta' => $filePath,
            ]);

            // Mover el archivo a la carpeta de destino
            $file->move(public_path('uploads'), $fileName);

            return response()->json(['message' => 'Archivo subido con éxito', 'file' => $projectFile], 201);
        } catch (\Exception $e) {
            Log::error('Error al subir el archivo: ' . $e->getMessage());
            return response()->json(['error' => 'Error al subir el archivo', 'details' => $e->getMessage()], 500);
        }
    }

    public function getProjectFiles($id)
{
    try {
        $files = ProjectFile::where('id_project', $id)->get();

        if ($files->isEmpty()) {
            return response()->json(['files' => []], 200);
        }

        return response()->json(['files' => $files], 200);
    } catch (\Exception $e) {
        Log::error('Error al obtener los archivos del proyecto: ' . $e->getMessage());
        return response()->json(['error' => 'Error al obtener los archivos del proyecto', 'details' => $e->getMessage()], 500);
    }
}

public function viewFile($id)
{
    try {
        // Obtener el archivo desde la base de datos
        $file = ProjectFile::findOrFail($id);

        // Ruta completa del archivo
        $filePath = public_path($file->ruta);

        // Verificar que el archivo existe
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'El archivo no existe'], 404);
        }

        // Devolver el archivo como respuesta para visualizarlo
        return response()->file($filePath);

    } catch (\Exception $e) {
        Log::error('Error al intentar mostrar el archivo: ' . $e->getMessage());
        return response()->json(['error' => 'Error al mostrar el archivo', 'details' => $e->getMessage()], 500);
    }
}

public function myDocuments()
{
    // Obtener el usuario logueado
    $user = \Illuminate\Support\Facades\Auth::user();
    if (!$user) {
        return redirect()->route('login'); // Redirige al usuario a la página de login si no está autenticado
    }

    // Obtener los documentos del usuario desde la base de datos
    $documents = MyFileProject::where('id_user', $user->id)->get();

    // Verifica si el usuario tiene documentos
    dd($documents); // Esto te mostrará el contenido de los documentos

    // Verifica que haya documentos para el usuario
    if ($documents->isEmpty()) {
        return back()->with('error', 'No tienes documentos subidos.');
    }

    // Retornar la vista con los documentos
    return view('alumno.partials.formatos', compact('documents'));
}


}


