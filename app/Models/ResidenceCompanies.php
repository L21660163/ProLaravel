<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResidenceCompanies extends Model
{
    //
    use HasFactory;

    protected $table = 'residence_companies';
    protected $fillable = ['nombre', 'active'];

}
 