<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidenceCompany;

class ResidenceCompanyController extends Controller
{
    /**
     * Mostrar la vista de registro de compañías.
     */
    public function index()
    {
        return view('GTyV.index');
    }

    /**
     * Almacenar una nueva compañía en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos enviados
        $request->validate([
            'id_person' => 'required|integer',
            'id_dictum' => 'required|in:1,2,3',
            'id_sector' => 'required|in:1,2',
            'nombre' => 'required|string|max:255',
            'rfc' => 'required|string|max:255',
            'lema' => 'nullable|string', // Permite nulos
            'mision' => 'nullable|string', // Permite nulos
            'valores' => 'nullable|string', // Permite nulos
            'calle' => 'nullable|string|max:255', // Permite nulos
            'colonia' => 'nullable|string|max:255', // Permite nulos
            'cp' => 'nullable|string|max:255', // Permite nulos
            'ciudad' => 'nullable|string|max:255', // Permite nulos
            'estado' => 'nullable|string|max:255', // Permite nulos
            'telefono' => 'nullable|string|max:255', // Permite nulos
            'active' => 'required|boolean',
        ]);

        // Crear un nuevo registro en la base de datos
        ResidenceCompany::create([
            'id_person' => $request->input('id_person'),
            'id_dictum' => $request->input('id_dictum'),
            'id_sector' => $request->input('id_sector'),
            'nombre' => $request->input('nombre'),
            'rfc' => $request->input('rfc'),
            'lema' => $request->input('lema', ''), // Valor predeterminado vacío
            'mision' => $request->input('mision', ''), // Valor predeterminado vacío
            'valores' => $request->input('valores', ''), // Valor predeterminado vacío
            'calle' => $request->input('calle', ''),
            'colonia' => $request->input('colonia', ''),
            'cp' => $request->input('cp', ''),
            'ciudad' => $request->input('ciudad', ''),
            'estado' => $request->input('estado', ''),
            'telefono' => $request->input('telefono', ''),
            'active' => $request->input('active'),
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('gtv.index')->with('success', 'Compañía registrada exitosamente.');
    }
}