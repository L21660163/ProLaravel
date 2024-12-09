<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceProjectCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_project',
        'id_company',
        'nombre',
        'active',
    ];


    public function company()
{
    return $this->belongsTo(ResidenceProjectCompany::class, 'id_company');
}

// Modelo ResidenceProjectCompany
public function projects()
{
    return $this->hasMany(ResidenceProject::class, 'id_company');
}
}