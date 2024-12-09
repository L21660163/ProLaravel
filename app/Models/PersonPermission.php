<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonPermission extends Model
{
    use HasFactory;

    protected $table = 'person_permissions';
    protected $fillable = ['name', 'active', 'time_created', 'time_updated'];
}