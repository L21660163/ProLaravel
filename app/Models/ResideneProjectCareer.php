<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceProjectCareer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_career',
        'id_project',
        'active',
    ];
}