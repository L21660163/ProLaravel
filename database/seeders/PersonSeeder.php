<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    public function run()
    {
        // Insertar datos en la tabla 'person_departments'
        DB::table('person_departments')->insert([
            [
                'id' => 1,
                'name' => 'Departamento de sistemas y computación',
                'active' => true,
                'time_created' => '2020-12-16 11:35:55',
                'time_updated' => null,
            ],
            [
                'id' => 2,
                'name' => 'Departamento de ciencias económico administrativas',
                'active' => true,
                'time_created' => '2020-12-16 11:36:27',
                'time_updated' => null,
            ],
            [
                'id' => 3,
                'name' => 'Departamento de ingeniería industrial',
                'active' => true,
                'time_created' => '2020-12-16 11:36:44',
                'time_updated' => null,
            ],
            [
                'id' => 4,
                'name' => 'Departamento de ciencias de la tierra',
                'active' => true,
                'time_created' => '2020-12-16 11:37:06',
                'time_updated' => null,
            ],
            [
                'id' => 5,
                'name' => 'Departamento de ciencias básicas',
                'active' => true,
                'time_created' => '2021-03-11 10:25:22',
                'time_updated' => null,
            ],
        ]);

        // Insertar datos en la tabla 'person_careers'
        DB::table('person_careers')->insert([
            [
                'id' => 1,
                'id_department' => 2,
                'career_id' => 'COP',
                'name' => 'CONTADOR PÚBLICO',
                'start_date' => '2010-04-10',
                'official_key' => 'COPU-2010-205',
                'active' => true,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => '2021-03-22 21:04:57',
            ],
            [
                'id' => 2,
                'id_department' => 4,
                'career_id' => 'ICI',
                'name' => 'INGENIERÍA CIVIL',
                'start_date' => '2010-04-20',
                'official_key' => 'ICIV-2010-208',
                'active' => true,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'id_department' => 2,
                'career_id' => 'IGE',
                'name' => 'INGENIERÍA EN GESTIÓN EMPRESARIAL',
                'start_date' => '2010-04-20',
                'official_key' => 'IGEM-2009-201',
                'active' => true,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => null,
            ],
            [
                'id' => 4,
                'id_department' => 1,
                'career_id' => 'IIN',
                'name' => 'INGENIERÍA INFORMÁTICA',
                'start_date' => '2010-04-01',
                'official_key' => 'IINF-2010-220',
                'active' => false,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => '2020-08-07 13:35:51',
            ],
            [
                'id' => 5,
                'id_department' => 3,
                'career_id' => 'IND',
                'name' => 'INGENIERÍA INDUSTRIAL',
                'start_date' => '2010-07-01',
                'official_key' => 'IIND-2010-227',
                'active' => true,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => null,
            ],
            [
                'id' => 6,
                'id_department' => 1,
                'career_id' => 'ISI',
                'name' => 'INGENIERÍA EN SISTEMAS COMPUTACIONALES',
                'start_date' => '2010-04-01',
                'official_key' => 'ISIC-2010-224',
                'active' => true,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => null,
            ],
            [
                'id' => 7,
                'id_department' => 2,
                'career_id' => 'L01',
                'name' => 'LICENCIATURA EN ADMINISTRACION',
                'start_date' => '1993-08-01',
                'official_key' => 'LADM1993300',
                'active' => false,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => '2020-08-07 13:35:58',
            ],
            [
                'id' => 8,
                'id_department' => 2,
                'career_id' => 'L02',
                'name' => 'LICENCIATURA EN CONTADURIA',
                'start_date' => '2001-08-01',
                'official_key' => 'LCON1993302',
                'active' => false,
                'created_at' => '2020-08-07 13:23:04',
                'updated_at' => '2021-03-22 21:05:03',
            ],
            [
                'id' => 9,
                'id_department' => 5,
                'career_id' => 'CB',
                'name' => 'CIENCIAS BÁSICAS',
                'start_date' => '2010-04-01',
                'official_key' => 'NA',
                'active' => true,
                'created_at' => '2021-03-11 10:27:11',
                'updated_at' => null,
            ],
        ]);

        DB::table('residence_sectors')->insert([
            [
                'id' => 1,
                'nombre' => 'Público',
                'active' => true,
                'time_created' => '2021-02-09 15:02:12',
                'time_updated' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'Privado',
                'active' => true,
                'time_created' => '2021-02-09 15:02:19',
                'time_updated' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


        DB::table('residence_project_types')->insert([
            [
                'id' => 1,
                'nombre' => 'Propuesta propia',
                'active' => true,
                'time_created' => '2020-11-24 10:51:15',
                'time_updated' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nombre' => 'Banco de proyectos',
                'active' => true,
                'time_created' => '2020-11-24 10:51:23',
                'time_updated' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        
    }
}
