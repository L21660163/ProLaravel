<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonCareer extends Model
{
    use HasFactory;

    protected $table = 'person_careers';
    protected $fillable = ['name', 'career_id'];
}
