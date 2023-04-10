<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaPageSeeder extends Seeder
{
    public function run()
    {
        DB::table('media_pages')->insert([
            [
                'media' => 'image/about/ab1.jpg',
                'section_id' => 5,
            ],
            [
                'media' => 'image/about/ab2.jpg',
                'section_id' => 5,
            ],
            [
                'media' => 'image/about/ab3.jpg',
                'section_id' => 5,
            ],
            [
                'media' => 'image/about/ab4.jpg',
                'section_id' => 5,
            ],
            [
                'media' => 'image/about/ab5.png',
                'section_id' => 6,
            ],
            [
                'media' => 'image/about/ab6.jpg',
                'section_id' => 6,
            ],
        ]);
    }
}
