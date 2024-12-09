<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceDocument extends Model
{
    use HasFactory;

    protected $table = 'residence_documents';
    protected $fillable = ['name', 'active', 'time_created'];
}
