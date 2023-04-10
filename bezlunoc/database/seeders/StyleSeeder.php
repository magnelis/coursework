<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StyleSeeder extends Seeder
{
    public function run()
    {
        DB::table('styles')->insert([
            [
                'style' => 'Графика',
                'price' => 4000,
            ],
            [
                'style' => 'Реализм',
                'price' => 6000,
            ],
            [
                'style' => 'Минимализм',
                'price' => 3000,
            ],
        ]);
    }
}
