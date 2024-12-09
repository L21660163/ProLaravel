<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ResidenceProjectPhasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $phases = [
            ['id' => 1, 'nombre' => 'Rechazado', 'active' => true, 'time_created' => '2020-11-24 10:51:48', 'time_updated' => null],
            ['id' => 2, 'nombre' => 'Revisión por jefe departamental', 'active' => true, 'time_created' => '2020-11-24 10:51:53', 'time_updated' => '2020-11-25 11:26:30'],
            ['id' => 3, 'nombre' => 'Revisión por academia', 'active' => true, 'time_created' => '2020-11-25 11:25:48', 'time_updated' => null],
            ['id' => 4, 'nombre' => 'Rechazado por academia', 'active' => true, 'time_created' => '2020-11-25 11:26:53', 'time_updated' => null],
            ['id' => 5, 'nombre' => 'Públicado', 'active' => true, 'time_created' => '2020-11-25 11:27:05', 'time_updated' => null],
            ['id' => 6, 'nombre' => 'Rechazado por coordinador de carrera', 'active' => true, 'time_created' => '2020-12-01 13:24:36', 'time_updated' => null],
            ['id' => 7, 'nombre' => 'En revisión por coordinador de carrera', 'active' => true, 'time_created' => '2020-12-01 13:24:54', 'time_updated' => null],
            ['id' => 8, 'nombre' => 'Autorización y asignación de revisor', 'active' => true, 'time_created' => '2020-12-09 09:41:28', 'time_updated' => '2021-03-22 14:06:06'],
            ['id' => 9, 'nombre' => 'Observación de revisor', 'active' => true, 'time_created' => '2020-12-09 09:42:07', 'time_updated' => null],
            ['id' => 10, 'nombre' => 'En revisión', 'active' => true, 'time_created' => '2020-12-09 09:55:45', 'time_updated' => null],
            ['id' => 11, 'nombre' => 'En asignación de asesor', 'active' => true, 'time_created' => '2020-12-09 09:55:53', 'time_updated' => null],
            ['id' => 12, 'nombre' => 'Entrega de documentos', 'active' => true, 'time_created' => '2020-12-09 09:56:18', 'time_updated' => null],
            ['id' => 13, 'nombre' => 'Finalizado', 'active' => true, 'time_created' => '2022-06-16 11:08:38', 'time_updated' => null],
            ['id' => 14, 'nombre' => 'En revisión por asesor', 'active' => true, 'time_created' => '2022-06-16 11:08:53', 'time_updated' => null],
            ['id' => 15, 'nombre' => 'Subir Carta Presentación y Aceptación', 'active' => true, 'time_created' => '2022-09-09 10:49:32', 'time_updated' => null],
        ];

        foreach ($phases as $phase) {
            DB::table('residence_project_phases')->insert([
                'id' => $phase['id'],
                'nombre' => $phase['nombre'],
                'active' => $phase['active'],
                'time_created' => $phase['time_created'],
                'time_updated' => $phase['time_updated'],
                'created_at' => Carbon::parse($phase['time_created']),
                'updated_at' => $phase['time_updated'] ? Carbon::parse($phase['time_updated']) : null,
            ]);
        }
    }
}
