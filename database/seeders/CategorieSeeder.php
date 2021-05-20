<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['nom' => 'art', 'created_at'=>now()],
            ['nom' => 'food', 'created_at'=>now()],
            ['nom' => 'voiture', 'created_at'=>now()],

        ]);
    }
}
