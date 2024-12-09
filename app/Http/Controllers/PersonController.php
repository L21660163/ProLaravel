<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    // Función para obtener solo id y name
    public function index()
    {
        // Obtener solo el id y el name de todas las personas
        $person = Person::select('id', 'name')->get();

        return response()->json($person);
    }
}
