<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            // EmpleadosTableSeeder::class,
            ClaseCuentasTableSeeder::class,
            GruposCuentasTableSeeder::class,
            EstadoFinancieroTableSeeder::class,
            BancosFase1ProyectoTableSeeder::class,
            TeamTableSeeder::class,
        ]);


        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
