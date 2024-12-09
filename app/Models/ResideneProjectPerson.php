<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ResidenceProjectPerson extends Model
{
    use HasFactory;

    protected $table = 'residence_project_persons';

    protected $fillable = [
        'id_project',
        'id_person',
        'id_dictum',
        'owner',
        'active',
    ];

    public static function withAlias()
    {
        return DB::table('residence_project_persons as residence_project_people');
    }
}
