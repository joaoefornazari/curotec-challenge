<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Get all project and category IDs
        $projectIds = DB::table('projects')->pluck('id')->toArray();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        
        for ($i = 0; $i < 45; $i++) {
            DB::table('tasks')->insert([
                'description' => $faker->sentence(10),
                'project' => $faker->randomElement($projectIds),
                'category' => $faker->randomElement($categoryIds),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
