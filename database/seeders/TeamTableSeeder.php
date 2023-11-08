<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $teams = [
            [

                'user_id' => '1',
                'name' => 'Admin Team',
                'personal_team' => '1',
            ],
            [

                'user_id' => '2',
                'name' => 'Gestor Team',
                'personal_team' => '2',
            ],
            [

                'user_id' => '3',
                'name' => 'Contador Team',
                'personal_team' => '3',
            ],
            [
                
                'user_id' => '4',
                'name' => 'User Team',
                'personal_team' => '4',
            ],
        ];

        Team::insert($teams);
    }
}
