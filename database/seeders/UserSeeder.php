<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'mehrdad',
            'email' => 'mehrdad.esmaeeli75@gmail.com',
            'role'=>'member'
        ]);
        User::factory()->create([
            'name' => 'sohrab',
            'email' => 'sohrab75@gmail.com',
            'role'=>'instructor'
        ]);
        User::factory()->create([
            'name' => 'morteza',
            'email' => 'morteza75@gmail.com',
            'role'=>'admin'
        ]);

        User::factory()->count(10)->create();
        User::factory()->count(10)->create([
            'role' => 'instructor'
        ]);
    }
}
