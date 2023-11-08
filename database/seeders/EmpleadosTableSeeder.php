<?php

namespace Database\Seeders;

use App\Models\Empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $empleados = [
            [

                'dpi' => '0213589635482',
                'nombre' => 'Admin',
                'apellido' => 'Admin',
                'fechadenacimiento' => ' 1997-07-08',
                'telefono' => '98465561',
                'celular' => '84616516',
                'direccion' => 'Ciudad',
                'salario' => '8000',
                'sexo' => 'Femenino'
            ],
            [

                'dpi' => '0213589635482',
                'nombre' => 'Gestor',
                'apellido' => 'Gestor',
                'fechadenacimiento' => ' 1997-07-08',
                'telefono' => '98465561',
                'celular' => '84616516',
                'direccion' => 'Ciudad',
                'salario' => '8000',
                'sexo' => 'Masculino'
            ],
            [

                'dpi' => '0213589635482',
                'nombre' => 'Contador',
                'apellido' => 'Contador',
                'fechadenacimiento' => ' 1997-07-08',
                'telefono' => '98465561',
                'celular' => '84616516',
                'direccion' => 'Ciudad',
                'salario' => '3000',
                'sexo' => 'Femenino'
            ],
            [

                'dpi' => '0213589635482',
                'nombre' => 'User',
                'apellido' => 'User',
                'fechadenacimiento' => ' 1997-07-08',
                'telefono' => '98465561',
                'celular' => '84616516',
                'direccion' => 'Ciudad',
                'salario' => '3000',
                'sexo' => 'Masculino'
            ],

        ];

        Empleado::insert($empleados);
    }
}
