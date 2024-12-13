<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MyFileProject extends Model
{

    use HasFactory;

    // Tabla asociada al modelo
    protected $table = 'myfiles_project';

    protected $fillable = ['id_user', 'name', 'ruta'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function myFileProjects()
{
    return $this->hasMany(MyFileProject::class, 'id_user');
}
}
