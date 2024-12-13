<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectFile extends Model
{
    use HasFactory;


    // Tabla asociada al modelo
    protected $table = 'project_file';

    // Llave primaria de la tabla
    protected $primaryKey = 'id';

    // Desactivar timestamps si no los usas
    public $timestamps = false;

    // Tipos de datos para las columnas
    protected $casts = [
        'id' => 'integer',
        'id_project' => 'integer',
        'name' => 'string',
        'ruta' => 'string',
    ];

    // Atributos que se pueden asignar en masa
    protected $fillable = [
        'id_project',
        'name',
        'ruta',
    ];

    public function projectFiles()
    {
        return $this->hasMany(ProjectFile::class, 'id_project');
    }
    // Relaciones

    /**
     * Relación con el modelo de proyecto.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id');
    }
}
