<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([PageSeeder::class]);
        $this->call([SectionSeeder::class]);
        $this->call([ContentSeeder::class]);
        $this->call([StyleSeeder::class]);
        $this->call([TattooSeeder::class]);
        $this->call([SizeSeeder::class]);
        $this->call([MediaPageSeeder::class]);
        $this->call([StatusSeeder::class]);
    }
}
