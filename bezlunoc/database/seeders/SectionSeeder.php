<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    public function run()
    {
        DB::table('sections')->insert([
            [
                'header' => 'Галерея работ',
                'page_id' => 1,
            ],
            [
                'header' => 'Что для нас важно?',
                'page_id' => 1,
            ],
            [
                'header' => 'Часто задаваемые вопросы',
                'page_id' => 1,
            ],
            [
                'header' => 'Галерея работ',
                'page_id' => 2,
            ],
            [
                'header' => 'Тату-студия "Bezlunoc"',
                'page_id' => 3,
            ],
            [
                'header' => 'Комфорт и безопасность',
                'page_id' => 3,
            ],
            [
                'header' => 'Контакты',
                'page_id' => 4,
            ],
        ]);
    }
}
