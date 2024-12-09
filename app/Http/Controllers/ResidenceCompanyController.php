<?php 

// Controlador: ResidenceCompanyController.php
namespace App\Http\Controllers;

use App\Models\ResidenceCompany;
use Illuminate\Http\Request;

class ResidenceCompanyController extends Controller
{
    public function index()
    {
        // Obtener todas las compañías activas
        $companies = ResidenceCompany::where('active', 1)->get();

        // Retornar vista con los datos
        return view('companies.index', ['companies' => $companies]);
    }
}