<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidenceCompany extends Model
{
    use HasFactory;

    // Tabla asociada
    protected $table = 'residence_companies';

    // Llave primaria
    protected $primaryKey = 'id';

    // Campos rellenables
    protected $fillable = [
        'id_person', 'id_dictum', 'id_sector', 'nombre', 'rfc', 'lema', 'mision', 'valores',
        'calle', 'colonia', 'cp', 'ciudad', 'estado', 'telefono', 'active',
    ];
}