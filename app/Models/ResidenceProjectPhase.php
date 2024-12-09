<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceProjectPhase extends Model
{
    use HasFactory;

    protected $table = 'residence_project_phases';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}
