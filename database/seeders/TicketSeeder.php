<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('airplane_tickets')->insert([
            'name'=>'alen',
            'surname'=>'markov',
            'email'=>'markovalen01@gmail.com',
            'phone_number'=>'078385193',
            'class'=>'First Class',
            'origin'=>'Skopje',
            'destination'=>'Paris',
            'date_of_going'=>'21.01.2024',
            'return_date'=>'05.02.2024',
            'adults_number'=>2,
            'kids_number'=>1,
            'babies_number'=>1
        ]);
    }
}
