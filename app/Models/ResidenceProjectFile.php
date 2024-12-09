<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceProjectFile extends Model
{
    use HasFactory;

    protected $table = 'residence_project_files';

    protected $fillable = [
        'id_project',
        'nombre',
        'tipo',
        'ruta',
        'active',
        'id_fileDictum',
        'id_fileType',
        'file_content'
    ];
}
