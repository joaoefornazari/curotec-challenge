<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all category IDs
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        
        for ($i = 0; $i < 22; $i++) {
            DB::table('projects')->insert([
                'name' => $faker->unique()->catchPhrase(),
                'amount' => $faker->numberBetween(1000, 100000),
                'category' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
