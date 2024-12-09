<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceFileDictum extends Model
{
    use HasFactory;

    protected $table = 'residence_file_dictums';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}