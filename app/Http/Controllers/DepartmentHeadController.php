<?php

namespace App\Http\Controllers;

use App\Models\ResidenceProject;
use Illuminate\Http\Request;

class DepartmentHeadController extends Controller
{
    public function index()
    {
        // Obtén proyectos agrupados por fase
        $projects = [
            'revision_academica' => ResidenceProject::where('id_project_phase', 3)->get(),
            'evaluacion' => ResidenceProject::where('id_project_phase', 7)->get(),
            'vigentes' => ResidenceProject::where('id_project_phase', 5)->get(),
            'finalizados' => ResidenceProject::where('id_project_phase', 13)->get(),
        ];

        // Retorna la vista con los datos
        return view('department_head.index', compact('projects'));
    }
}
