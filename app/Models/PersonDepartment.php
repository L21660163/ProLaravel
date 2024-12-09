<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonDepartment extends Model
{
    use HasFactory;

    protected $table = 'person_departments';
    protected $fillable = ['name', 'active'];
}
