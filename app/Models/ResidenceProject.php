<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\ProjectPhase;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceProject extends Model
{

    protected $table = 'residence_projects';

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
        'id_career',
        'control_number',
    ];

    public function company()
{
    return $this->belongsTo(ResidenceCompanies::class, 'id_company', 'id');
}

public function members()
{
    return $this->belongsToMany(Person::class, 'residence_project_persons', 'id_project', 'control_number');
}

public function phases()
{
    return $this->hasMany(ResidenceProjectPhase::class, 'id_project');
}

public function phase()
    {
        return $this->belongsTo(ResidenceProjectPhase::class, 'id_project_phase');
    }

    public function projectFiles()
    {
        return $this->hasMany(ProjectFile::class, 'id_project', 'id'); // 'id_project' se refiere al campo en la tabla 'project_file'
    }
}

class ResidenceProjects extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function projectFiles()
    {
        return $this->hasMany(ProjectFile::class, 'id_project');
    }
}