<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceSector extends Model
{
    use HasFactory;

    protected $table = 'residence_sectors';
    protected $fillable = ['nombre', 'active', 'time_created', 'time_updated'];
}