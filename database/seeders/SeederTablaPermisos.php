<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla estudiantes
            'ver-estudiantes',
            'crear-estudiantes',
            'editar-estudiantes',
            'borrar-estudiantes'
        ];
        foreach($permisos as $permiso) {
            Permission::create(['name'=>$permiso]);
        }
    }
}
