<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ResidenceCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('residence_companies')->insert([
            [
                'Id' => 92,
                'Id_Person' => 9,
                'Id_Dictum' => 2,
                'Id_Sector' => 1,
                'Nombre' => 'TECWIL S.A. DE C.V.',
                'RFC' => 'TEC980402LH8',
                'Lema' => 'MAQUINADOS INDUSTRIALES Y SOLDADURA',
                'Mision' => 'ENTREGAR EN TIEMPO Y FORMA LOS TRABAJOS Y CON BUENA CALIDAD.',
                'Valores' => 'HONESTIDAD,LIBERTAD,PUNTUALIDAD EN ENTREGAS,DILIGENCIA',
                'Calle' => 'vitoria # 12',
                'Colonia' => 'centro',
                'CP' => '78830',
                'Ciudad' => 'villa de la paz',
                'Estado' => 'san luis potosi',
                'Telefono' => '4888820079',
                'Active' => 1,
                'TimeCreated' => '2021-09-13 23:12:44',
                'TimeUpdated' => null,
            ],
            [
                'Id' => 93,
                'Id_Person' => 9,
                'Id_Dictum' => 2,
                'Id_Sector' => 2,
                'Nombre' => 'DILTEX S.A DE C.V',
                'RFC' => 'DIL851028QL2',
                'Lema' => 'Tejiendo historias de éxito',
                'Mision' => 'Creamos y vendemos productos mediante marcas de moda que añaden valor práctico y emocional a la vida de las personas. Brindamos seguridad, bienestar y satisfacción a nuestros colaboradores y operamos dentro de una sociedad global, con fuerte compromiso en la sustentabilidad social, económica y ambiental.',
                'Valores' => 'Felicidad, Innovacion, Trabajo en equipo, Respeto,Responsabilidad,Honestidad',
                'Calle' => 'JULIAN CARRILLO #201',
                'Colonia' => 'DEL BOSQUE',
                'CP' => '78783',
                'Ciudad' => 'MATEHUALA',
                'Estado' => 'SAN LUIS POTOSI',
                'Telefono' => '4888829498',
                'Active' => 1,
                'TimeCreated' => '2021-09-14 20:23:38',
                'TimeUpdated' => null,
            ],
        ]);


    }
}
