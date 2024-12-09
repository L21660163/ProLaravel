<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectoController extends Controller
{
    public function index()
    {
        // Obtener todos los proyectos de la base de datos
        $proyectos = Proyecto::all();

        // Retornar la vista con los proyectos
        return view('proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:revision,evaluacion,vigente,finalizado',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:5120',
        ]);

        $data = $request->all();

        // Subir imagen si se proporciona
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes', 'public');
        }

        // Subir PDF si se proporciona
        if ($request->hasFile('pdf')) {
            $data['pdf'] = $request->file('pdf')->store('pdfs', 'public');
        }

        Proyecto::create($data);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente.');
    }
}
