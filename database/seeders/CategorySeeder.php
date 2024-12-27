<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Bitcoin',
                'created_at' => '2024-12-26 15:03:19',
                'updated_at' => '2024-12-26 15:03:19',
            ],
            [
                'id' => 2,
                'name' => 'Altcoin',
                'created_at' => '2024-12-26 15:03:29',
                'updated_at' => '2024-12-26 15:03:29',
            ],
            [
                'id' => 3,
                'name' => 'Market',
                'created_at' => '2024-12-26 15:03:59',
                'updated_at' => '2024-12-26 15:03:59',
            ]
        ]);
    }
}
