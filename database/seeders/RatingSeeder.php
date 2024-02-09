<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ratings')->insert([
            ['rating' => 1],
            ['rating' => 2],
            ['rating' => 3],
            ['rating' => 4],
            ['rating' => 5]
        ]);
    }
}
