<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'projects'; // Asegúrate de tener una tabla 'projects'

    // Los atributos que se pueden asignar masivamente
    protected $fillable = ['title', 'description', 'user_id'];

    // Relación con el modelo User (si un proyecto pertenece a un usuario)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
