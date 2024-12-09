<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ResidenceProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('residence_project_careers')->insert([
            [
                'Id' => 10,
                'Id_Career' => 5,
                'Id_Project' => 10,
                'Active' => 1,
            ],
            [
                'Id' => 11,
                'Id_Career' => 2,
                'Id_Project' => 11,
                'Active' => 1,
            ],
            [
                'Id' => 13,
                'Id_Career' => 2,
                'Id_Project' => 12,
                'Active' => 1,
            ],
        ]);
        
    }
}
