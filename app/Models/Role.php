<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id')
                    ->where('model_type', User::class);
    }

    // Nombre de la tabla en la base de datos
    protected $table = 'roles'; // Asegúrate de tener una tabla 'roles' en tu base de datos

    // Los atributos que se pueden asignar masivamente
    protected $fillable = ['name'];

}
