<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('publishers')->insert([
            'publisher' => 'Gramedia',
            'city' => "Jakarta"
        ]);
        DB::table('publishers')->insert([
            'publisher' => 'Kozko',
            'city' => "Citraland"
        ]);
        DB::table('publishers')->insert([
            'publisher' => 'Amazona',
            'city' => "USA"
        ]);
        DB::table('publishers')->insert([
            'publisher' => 'Wdym',
            'city' => "Europe"
        ]);
        DB::table('publishers')->insert([
            'publisher' => 'UCM',
            'city' => "Absolutely Makassar"
        ]);
    }
}
