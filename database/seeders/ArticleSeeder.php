<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                "src" => "been.jpg",
                "auteur" => "Mr Been",
                'titre' => 'Faire rire sans parler',
                'description' => 'Lorem lorem lorem ipsum lorem ipsum',
                'created_at' => now(),
            ],
            [
                "src" => "dbz.jpg",
                "auteur" => "Ayhan",
                'titre' => 'Dragon ball meilleur manga',
                'description' => 'Lorem lorem lorem ipsum lorem ipsum',
                'created_at' => now(),
            ],
        ]); 
    }
}
