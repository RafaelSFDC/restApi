<?php

namespace Database\Seeders;

use App\Models\Categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::factory()->create([
            'name' => "Web Developer"
        ]);
        
        Categories::factory()->create([
            'name' => "Backend Developer"
        ]);
        
        Categories::factory()->create([
            'name' => "Mobile Developer"
        ]);
        
        Categories::factory()->create([
            'name' => "Full Stack Developer"
        ]);
        
        Categories::factory()->create([
            'name' => "Designer"
        ]);
        
        Categories::factory()->create([
            'name' => "Other"
        ]);
    }
}
