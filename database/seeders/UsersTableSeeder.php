<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'email_verified_at' => null,
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],

            [
                'name'              => 'Gestor',
                'email'             => 'gestor@gestor.com',
                'email_verified_at' => null,
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],

            [
                'name'              => 'Contador',
                'email'             => 'contador@contador.com',
                'email_verified_at' => null,
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],

            [
                'name'              => 'User',
                'email'             => 'user@user.com',
                'email_verified_at' => null,
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],
        ];

        User::insert($users);
    }
}
