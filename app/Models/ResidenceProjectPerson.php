<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResidenceProjectPerson extends Model
{
    protected $fillable = [
        'id_project',
        'id_user',
    ];
}
