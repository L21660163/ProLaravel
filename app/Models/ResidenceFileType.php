<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceFileType extends Model
{
    use HasFactory;

    protected $table = 'residence_file_types';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}
