<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;


class JefeCarreraController extends Controller
{
    public function index()
    {
        // Página principal del jefe de carrera
        return view('jefe_carrera.dashboard');
    }

    public function assignAdvisors()
    {
        // Asignar asesores
        $projects = Project::all();
        $advisors = User::role('docente')->get();
        return view('jefe_carrera.advisors.assign', compact('projects', 'advisors'));
    }

    public function approveProjects()
    {
        // Aprobar proyectos
        $projects = Project::where('status', 'pending')->get();
        return view('jefe_carrera.projects.approve', compact('projects'));
    }
}

