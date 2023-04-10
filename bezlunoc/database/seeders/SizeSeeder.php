<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    public function run()
    {
        DB::table('sizes')->insert([
            [
                'size' => 'Маленькая',
                'price' => 2500,
            ],
            [
                'size' => 'Средняя',
                'price' => 6000,
            ],
            [
                'size' => 'Большая',
                'price' => 25000,
            ],
        ]);
    }
}
