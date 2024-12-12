<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceProjects extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function projectFiles()
    {
        return $this->hasMany(ProjectFile::class, 'id_project');
    }
}

class ProjectFile extends Model
{
    use HasFactory;

    protected $table = 'project_file'; // Especifica el nombre correcto de la tabla
    protected $fillable = ['id_project', 'name', 'ruta'];

    public function residenceProject()
    {
        return $this->belongsTo(ResidenceProject::class, 'id_project', 'id');
    }
    

}

