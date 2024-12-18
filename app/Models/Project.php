<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'residence_projects'; // Asegúrate de tener una tabla 'projects'

    // Los atributos que se pueden asignar masivamente
    protected $fillable = ['title', 'description', 'user_id', 'fase_id', 'estado'];

    // Relación con el modelo User (si un proyecto pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function index()
{
    try {
        $response = $this->getUserProjects(request());
        
        if ($response->status() == 200) {
            $projects = $response->original['projects'];
        } else {
            $projects = [];
        }

        return view('projects.index', ['projects' => $projects]);
    } catch (\Exception $e) {
        \Illuminate\Support\Facades\Log::error('Error al cargar la vista: ' . $e->getMessage());
        return view('projects.index', ['projects' => []]);
    }
}

public function fase()
    {
        return $this->belongsTo(ResidenceProjectPhase::class, 'fase_id');
    }

}
