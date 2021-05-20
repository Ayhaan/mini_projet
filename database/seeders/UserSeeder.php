<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nom' => 'Caliskan',
                'prenom' => 'Ayhan',
                'age' => 24,
                'avatar_id' => 3,
                'role_id' => 1,
                'email' => "ayhan@molengeek.com",
                'password' =>Hash::make('testtest'),
                'created_at' => now(),
            ],
            [
                'nom' => 'Abou',
                'prenom' => 'Elias',
                'age' => 24,
                'avatar_id' => 5,
                'role_id' => 2,
                'email' => "test@test.com",
                'password' =>Hash::make('testtest'),
                'created_at' => now(),
            ],
            [
                'nom' => 'Valentine',
                'prenom' => 'Zulma',
                'age' => 25,
                'avatar_id' => 2,
                'role_id' => 2,
                'email' => "test@testtest.com",
                'password' =>Hash::make('testtest'),
                'created_at' => now(),
            ],
            [
                'nom' => 'Gg',
                'prenom' => 'Julie',
                'age' => 25,
                'avatar_id' => 4,
                'role_id' => 1,
                'email' => "test@molengeek.com",
                'password' =>Hash::make('testtest'),
                'created_at' => now(),
            ],
            [
                'nom' => 'Cactus',
                'prenom' => 'Abderrahim',
                'age' => 25,
                'avatar_id' => 5,
                'role_id' => 2,
                'email' => "cactus@molengeek.com",
                'password' =>Hash::make('testtest'),
                'created_at' => now(),
            ],
            [
                'nom' => 'BG',
                'prenom' => 'YO',
                'age' => 25,
                'avatar_id' => 2,
                'role_id' => 1,
                'email' => "yo@bs.com",
                'password' =>Hash::make('testtest'),
                'created_at' => now(),
            ],
        ]);
    }
}
