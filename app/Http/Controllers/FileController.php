<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidenceProject;
use App\Models\ProjectFile;

class FileController extends Controller
{
    public function index()
    {
        $projects = ResidenceProject::all(); // Traer todos los usuarios
        return view('subirprojecto.index', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_project' => 'required|exists:residence_projects,id',
            'archivo' => 'required|mimes:pdf|max:2048', // Solo PDF, máximo 2MB
        ]);

        $file = $request->file('archivo');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $fileName, 'public');

        ProjectFile::create([
            'id_project' => $request->id_project,
            'name' => $fileName,
            'ruta' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Archivo subido correctamente.');
    }
}