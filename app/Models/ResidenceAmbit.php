<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceAmbit extends Model
{
    use HasFactory;

    protected $table = 'residence_ambits';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}