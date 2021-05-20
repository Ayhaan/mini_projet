<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatars')->insert([
            [
                'nom' => 'default',
                'src' => 'anonyme.png',
                'created_at' => now(),
            ],
            [
                'nom' => 'Avatar Femme',
                'src' => 'avatarFemme.png',
                'created_at' => now(),
            ],
            [
                'nom' => 'Avatar Homme',
                'src' => 'avatar.png',
                'created_at' => now(),
            ],
            [
                'nom' => 'Avatar Femme 2',
                'src' => 'avatarFemme2.png',
                'created_at' => now(),
            ],
            [
                'nom' => 'Avatar Homme 2',
                'src' => 'avatarhomme2.png',
                'created_at' => now(),
            ],
        ]);
    }
}
