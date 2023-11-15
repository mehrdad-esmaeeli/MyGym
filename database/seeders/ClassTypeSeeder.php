<?php

namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClassType::create([
            'name' => 'footsal',
            'description' => fake()->text(),
            'minutes' => 60
        ]);
        ClassType::create([
            'name' => 'handball',
            'description' => fake()->text(),
            'minutes' => 40
        ]);
        ClassType::create([
            'name' => 'boxing',
            'description' => fake()->text(),
            'minutes' => 120
        ]);
        ClassType::create([
            'name' => 'football',
            'description' => fake()->text(),
            'minutes' => 50
        ]);
    }
}
