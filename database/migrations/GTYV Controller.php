<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

class GTYVController extends Controller
{
    public function index()
    {
        $empresasActivas = Empresa::where('estatus', 'activa')->get();
        $empresasInactivas = Empresa::where('estatus', 'inactiva')->get();

        return view('empresas.index', compact('empresasActivas', 'empresasInactivas'));
    }

    public function create()
    {
        return view('empresas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_compania' => 'required|unique:empresas',
            'nombre' => 'required',
            'rfc' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo_electronico' => 'required|email',
            'representante' => 'required',
            'giro' => 'required',
            'estatus' => 'required|in:activa,inactiva',
        ]);

        Empresa::create($request->all());

        return redirect()->route('empresas.index')->with('success', 'Empresa registrada correctamente.');
    }
}
