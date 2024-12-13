<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Proyecto; // Importa el modelo Proyecto
use Illuminate\Http\Request;

class JefeAcademiaController extends Controller
{
    public function index()
    {
        // Obtén los proyectos desde la base de datos según su estado
        $proyectosRevision = Project::where('estado', 'revision')->get();
        $proyectosEvaluacion = Project::where('estado', 'evaluacion')->get();
        $proyectosVigentes = Project::where('estado', 'vigente')->get();
        $proyectosFinalizados = Project::where('estado', 'finalizado')->get();

        return view('jefeacademia.index', compact(
            'proyectosRevision',
            'proyectosEvaluacion',
            'proyectosVigentes',
            'proyectosFinalizados'
        ));
    }

    // Método para mostrar el detalle de un proyecto
    public function detalle($id)
    {
        $proyecto = Project::findOrFail($id); // Buscar el proyecto por ID
        return view('jefeacademia.detalle', compact('proyecto')); // Pasar el proyecto a la vista
    }

    public function crear()
    {
        
        return view('jefeacademia.crear', compact('proyecto'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $proyecto = new Project();
        $proyecto->nombre = $request->nombre;
        $proyecto->descripcion = $request->descripcion;

        // Guardar imagen si existe
        if ($request->hasFile('imagen')) {
            $proyecto->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        // Guardar PDF si existe
        if ($request->hasFile('pdf')) {
            $proyecto->pdf = $request->file('pdf')->store('pdfs', 'public');
        }

        $proyecto->save();

        return redirect()->route('jefeacademia.index')->with('success', 'Proyecto creado exitosamente');
    }

}