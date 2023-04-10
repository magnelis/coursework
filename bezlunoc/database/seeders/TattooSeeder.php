<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TattooSeeder extends Seeder
{
    public function run()
    {
        DB::table('tattoos')->insert([
            [
                'name' => 'Дракон',
                'photo' => 'image/tattoos/first.jpg',
                'style_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Сердце',
                'photo' => 'image/tattoos/second.jpg',
                'style_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Сердце',
                'photo' => 'image/tattoos/three.jpg',
                'style_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
