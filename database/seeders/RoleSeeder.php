<?php

namespace Database\Seeders;

use Faker\Provider\ar_EG\Person;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission as ContractsPermission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::create(['name' => 'alumno.home']);

        // Crear permisos
        Permission::create(['name' => 'ver_proyectos']);
        Permission::create(['name' => 'registrar_residencia']);
        Permission::create(['name' => 'subir_reportes']);
        Permission::create(['name' => 'evaluar_proyectos']);
        Permission::create(['name' => 'aprobar_proyectos']);
        Permission::create(['name' => 'asignar_asesores']);
        Permission::create(['name' => 'gestionar_convenios']);
        Permission::create(['name' => 'revisar_requisitos']);
        Permission::create(['name' => 'aprobar_informe_final']);

        // Crear permisos para el administrador
        Permission::create(['name' => 'ver_usuarios']);
        Permission::create(['name' => 'gestionar_residencias']);
        Permission::create(['name' => 'asignar_roles']);

        // Crear roles y asignar permisos
        $alumno = Role::create(['name' => 'alumno']);
        $alumno->givePermissionTo(['ver_proyectos', 'registrar_residencia', 'subir_reportes']);

        $docente = Role::create(['name' => 'docente']);
        $docente->givePermissionTo(['ver_proyectos', 'evaluar_proyectos', 'aprobar_informe_final']);

        $division = Role::create(['name' => 'division']);
        $division->givePermissionTo(['ver_proyectos', 'aprobar_proyectos', 'aprobar_informe_final']);

        $jefe_carrera = Role::create(['name' => 'jefe_carrera']);
        $jefe_carrera->givePermissionTo(['ver_proyectos', 'aprobar_proyectos', 'asignar_asesores']);

        $academico = Role::create(['name' => 'academico']);
        $academico->givePermissionTo(['ver_proyectos', 'revisar_requisitos']);

        $gestion = Role::create(['name' => 'gestion']);
        $gestion->givePermissionTo(['ver_proyectos', 'gestionar_convenios']);

        // Crear rol Admin
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['ver_usuarios', 'ver_proyectos', 'gestionar_residencias', 'asignar_roles']);

    }

}
