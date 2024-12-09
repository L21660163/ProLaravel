<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceProjectType extends Model
{
    use HasFactory;

    protected $table = 'residence_project_types';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}