<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,  // Must run first as others depend on categories
            ProjectSeeder::class,   // Must run before tasks
            TaskSeeder::class,
        ]);
    }
}
