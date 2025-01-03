<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Laravel', 'PHP', 'HTML', 'CSS', 'Java', 'Python', 'C++', 'C#', 'C', 'Ruby', 'Django', 'Flask', 'FastAPI', 'Symfony'];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}
