<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidenceProject;

class ResidenceProjectController extends Controller
{
    public function index()
    {
        return view('subirproyecto.index');
    }

    public function store(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'id_project_type' => 'required|integer|in:1,2', // Validar que sea 1 o 2
            'id_nature' => 'required|integer|in:1,2,3', // Validar que sea 1, 2 o 3
            'id_ambit' => 'required|integer|in:1,2,3,4,5,6', // Validar que esté entre 1 y 6
            'objetivo_general' => 'required|string',
            'pdf_file' => 'required|file|mimes:pdf|max:2048', // PDF requerido
        ]);

        // Subir archivo PDF
        if ($request->hasFile('pdf_file')) {
            $pdfPath = $request->file('pdf_file')->store('public/pdf_files');
            $validated['pdf_file'] = basename($pdfPath);
        }

        // Asegurarse de que el id_company tenga un valor por defecto si no se pasa en la solicitud
        $validated['id_company'] = $validated['id_company'] ?? 34; // Si no se pasa, asigna 34

        // Crear el proyecto
        ResidenceProject::create([
            'titulo' => $validated['titulo'],
            'id_project_type' => $validated['id_project_type'],
            'id_nature' => $validated['id_nature'],  // Asignar id_nature
            'id_ambit' => $validated['id_ambit'],    // Asignar id_ambit
            'objetivo_general' => $validated['objetivo_general'],
            'pdf_file' => $validated['pdf_file'],
            'id_company' => $validated['id_company'],  // Asignar id_company
        ]);

        return redirect()->route('residenceproject.index')->with('success', 'Proyecto subido correctamente.');
    }


}
