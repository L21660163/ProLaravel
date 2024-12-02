<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Project;


class AlumnoController extends Controller
{
    public function index()
    {
        // Página principal del alumno
        return view('alumno.dashboard');
    }

    public function registerResidency()
    {
        // Registrar residencia
        return view('alumno.residency.register');
    }

    public function uploadReports()
    {
        // Subir reportes
        return view('alumno.reports.upload');
    }

    public function viewProjects()
    {
        // Ver proyectos
        $projects = Project::all(); // Modelo Project debe estar definido
        return view('alumno.projects.index', compact('projects'));
    }
}

