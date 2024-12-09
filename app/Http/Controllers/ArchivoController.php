<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArchivoController extends Controller
{
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

    public function mostrarArchivos()
{
    $userId = Auth::id(); // Obtén el ID del usuario autenticado
    $userFolder = 'usuarios/' . $userId; // Carpeta del usuario por ID

    // Verifica si la carpeta del usuario existe
    if (Storage::exists($userFolder)) {
        $archivos = Storage::files($userFolder); // Obtiene los archivos de la carpeta del usuario
    } else {
        $archivos = []; // Si no hay archivos, retorna un arreglo vacío
    }

    // Organiza los archivos por secciones según su nombre o prefijo
    $archivosPorSeccion = [
        'cartaAceptacion' => [],
        'informeTecnico' => [],
        'formato8b' => [],
        'formato9' => [],
        'cartaTerminacion' => [],
    ];

    foreach ($archivos as $archivo) {
        if (Str::contains($archivo, 'carta-aceptacion')) {
            $archivosPorSeccion['cartaAceptacion'][] = $archivo;
        } elseif (Str::contains($archivo, 'informe-tecnico')) {
            $archivosPorSeccion['informeTecnico'][] = $archivo;
        } elseif (Str::contains($archivo, 'formato-8b')) {
            $archivosPorSeccion['formato8b'][] = $archivo;
        } elseif (Str::contains($archivo, 'formato-9')) {
            $archivosPorSeccion['formato9'][] = $archivo;
        } elseif (Str::contains($archivo, 'carta-terminacion')) {
            $archivosPorSeccion['cartaTerminacion'][] = $archivo;
        }
    }

    return view('dashboard', compact('archivosPorSeccion'));
}

}
