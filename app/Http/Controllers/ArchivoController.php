<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArchivoController extends Controller
{
    public function mostrarArchivos()
{
    // Obtener los archivos de la carpeta 'archivos' en el disco local
    $archivos = Storage::disk('local')->files('archivos');
    
    // Pasar los archivos a la vista 'dashboard'
    return view('dashboard', compact('archivos'));
}

    public function subir(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf,docx',
    ]);

    $file = $request->file('archivo');

    // Normalizar el nombre del archivo para evitar caracteres especiales
    $filename = Str::slug($request->input('nombre')) . '.' . $file->getClientOriginalExtension();

    // Guardar el archivo con el nombre normalizado
    $path = $file->storeAs('archivos', $filename, 'public');

    return redirect()->back()->with('success', 'Archivo cargado exitosamente.');
}

    public function descargar($archivo)
    {
        // Obtener el archivo desde el disco local
        $path = Storage::disk('local')->path('archivos/' . $archivo);

        // Verificar si el archivo existe
        if (Storage::disk('local')->exists('archivos/' . $archivo)) {
            // Regresar la respuesta de descarga del archivo
            return response()->download($path);
        } else {
            abort(404);
        }
    }
}
