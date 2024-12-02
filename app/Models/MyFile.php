<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyFile extends Model
{
    use HasFactory;

    protected $table = 'myfile'; // Si el nombre de la tabla es diferente al del modelo
    protected $fillable = [
        'Id_Person', 'Id_FileType', 'Id_FileDictum', 'Nombre', 'Tipo', 'Ruta', 'Active', 'TimeCreated', 'TimeUpdated'
    ];
}


