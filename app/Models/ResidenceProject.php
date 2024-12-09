<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\ProjectPhase;

class ResidenceProject extends Model
{
    protected $fillable = [
        'id_project_type',
        'id_company',
        'id_nature',
        'id_ambit',
        'id_kind',
        'id_project_phase',
        'titulo',
        'objetivo_general',
        'objetivos_especificos',
        'justificacion',
        'actividades',
        'comentarios',
        'active',
    ];

    public function company()
{
    return $this->belongsTo(ResidenceCompanies::class, 'id_company', 'id');
}

public function members()
{
    return $this->belongsToMany(Person::class, 'residence_project_persons', 'id_project', 'id_person');
}

public function phases()
{
    return $this->hasMany(ResidenceProjectPhase::class, 'id_project');
}
}
