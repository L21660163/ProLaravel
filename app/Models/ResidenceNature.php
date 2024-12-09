<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceNature extends Model
{
    use HasFactory;

    protected $table = 'residence_natures';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}