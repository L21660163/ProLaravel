<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinalReport extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'final_reports'; // Asegúrate de tener una tabla 'final_reports'

    // Los atributos que se pueden asignar masivamente
    protected $fillable = ['project_id', 'content'];

    // Relación con el modelo Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
