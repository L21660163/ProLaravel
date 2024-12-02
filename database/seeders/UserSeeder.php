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
            'name' => 'Maria Lizet Molina Obregon',
            'email' => 'marili@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('alumno');

        User::create([
            'name' => 'Tania Ortega',
            'email' => 'taniaortega@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('alumno');

        User::create([
            'name' => 'Miguel Gaytan Ortiz',
            'email' => 'gytanortiz@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('alumno');

        User::create([
            'name' => 'Ezequiel Hernandez Perez',
            'email' => 'ezehernandez@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('alumno');

        User::create([
            'name' => 'Miriam Lopez Garcia',
            'email' => 'miriamlopez@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');
        User::create([
            'name' => 'Pamela Ledezma Juarez',
            'email' => 'pamelajuarez@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');

        User::create([
            'name' => 'Isael Torres Ortiz',
            'email' => 'torres@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');
        User::create([
            'name' => 'Carlos Villalobos Heguia',
            'email' => 'heguiacarlos@gmail.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('docente');
    }
}
