<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    public function run()
    {
        DB::table('pages')->insert([
            [
                'name' => 'Главная',
            ],
            [
                'name' => 'Галерея работ',
            ],
            [
                'name' => 'О студии',
            ],
            [
                'name' => 'Контакты',
            ],
        ]);
    }
}
