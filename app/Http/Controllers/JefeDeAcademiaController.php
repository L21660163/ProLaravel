<?php
namespace App\Http\Controllers;

use App\Models\ResidenceProject;
use Illuminate\Http\Request;

class JefeDeAcademiaController extends Controller
{
    public function index()
    {
        // Mostrar proyectos con fase 'pendiente' (id_project_phase = 3)
        $proyectos = ResidenceProject::where('id_project_phase', 3)->get();
        return view('jefeacademia.index', compact('proyectos'));
    }

    public function proceso(Request $request, $id)
    {
        // Validar los comentarios
        $request->validate([
            'comentarios' => 'nullable|string|max:255',
        ]);

        // Encontrar el proyecto
        $proyecto = ResidenceProject::findOrFail($id);

        // Obtener la acción (aceptar o rechazar)
        $accion = $request->input('accion');

        // Cambiar la fase y guardar el comentario según la acción
        if ($accion === 'aceptar') {
            $proyecto->id_project_phase = 5; // Aceptado
        } elseif ($accion === 'rechazar') {
            $proyecto->id_project_phase = 4; // Rechazado
        }

        // Guardar comentarios (si los hay)
        $proyecto->comentarios = $request->comentarios;
        $proyecto->save();

        // Redirigir con mensaje de éxito
        $mensaje = $accion === 'aceptar' ? 'Proyecto aprobado con éxito.' : 'Proyecto rechazado con éxito.';
        return redirect()->route('jefedeacademia.index')->with('success', $mensaje);
    }
} 