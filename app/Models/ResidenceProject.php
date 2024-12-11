<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_project_phase', 'id_project_type', 'id_company', 'id_nature', 'id_ambit',
        'id_kind', 'titulo', 'objetivo_general', 'objetivos_especificos', 'justificacion',
        'actividades', 'comentarios', 'id_career', 'control_number'
    ];

    // Relación con ResidenceProjectPhase
    public function phase()
    {
        return $this->belongsTo(ResidenceProjectPhase::class, 'id_project_phase');
    }
}

