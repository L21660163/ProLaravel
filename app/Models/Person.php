<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table = 'person';

    protected $fillable = ['name', 'control_number', 'active'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
