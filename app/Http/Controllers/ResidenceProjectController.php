<?php

namespace App\Http\Controllers;

use App\Models\ResidenceProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Person;
use App\Models\ResidenceProjectPerson;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; // Importamos Carbon para el manejo de fechas

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
            $user = \Illuminate\Support\Facades\Auth::user();

            if (!$user) {
                return response()->json(['error' => 'Usuario no autenticado'], 401);
            }

            $person = Person::where('control_number', $user->control_number)->first();

            if (!$person) {
                return response()->json(['error' => 'No se encontró una persona asociada a este usuario'], 404);
            }

            $residenceProjectPersons = DB::table('residence_project_persons as residence_project_people')
                ->where('id_person', $person->id)
                ->get();

            if ($residenceProjectPersons->isEmpty()) {
                return response()->json(['error' => 'No se encontraron proyectos relacionados para esta persona'], 404);
            }

            $projectIds = $residenceProjectPersons->pluck('id_project');

            $projects = ResidenceProject::whereIn('id', $projectIds)
                ->with('company')
                ->get()
                ->map(function ($project) use ($residenceProjectPersons) {
                    $personRelation = $residenceProjectPersons->first(function ($relation) use ($project) {
                        return $relation->id_project === $project->id;
                    });

                    $personName = $personRelation
                        ? DB::table('person')->where('id', $personRelation->id_person)->value('name')
                        : 'Sin persona asociada';

                    return [
                        'id' => $project->id,
                        'titulo' => $project->titulo,
                        'company_name' => $project->company ? $project->company->nombre : 'Sin compañía asociada',
                        'person_name' => $personName,
                        'created_at' => $this->timeAgo($project->created_at), // Fecha en formato "hace X tiempo"
                    ];
                });

            return response()->json(['projects' => $projects]);
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
}
