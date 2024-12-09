<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Ezequiel Hernandez Perez',
            'email' => 'ezehernandez@matehuala.tecnm.mx',
            'password' => bcrypt('123456789'),
        ])->assignRole('alumno');

        User::create([
            'name' => 'Miriam Lopez Garcia',
            'email' => 'miriamlopez@matehuala.tecnm.mx',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');
        User::create([
            'name' => 'Pamela Ledezma Juarez',
            'email' => 'pamelajuarez@matehuala.tecnm.mx',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');

        User::create([
            'name' => 'Isael Torres Ortiz',
            'email' => 'torres@matehuala.tecnm.mx',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');
        User::create([
            'name' => 'Carlos Villalobos Heguia',
            'email' => 'heguiacarlos@matehuala.tecnm.mx',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');
    }
}
