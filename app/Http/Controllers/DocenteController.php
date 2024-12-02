<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\FinalReport;

class DocenteController extends Controller
{
    public function index()
    {
        // Página principal del docente
        return view('docente.dashboard');
    }

    public function evaluateProjects()
    {
        // Evaluar proyectos
        $projects = Project::where('status', 'submitted')->get();
        return view('docente.projects.evaluate', compact('projects'));
    }

    public function approveFinalReport()
    {
        // Aprobar informes finales
        $reports = FinalReport::all(); // Modelo FinalReport debe estar definido
        return view('docente.reports.approve', compact('reports'));
    }
}

