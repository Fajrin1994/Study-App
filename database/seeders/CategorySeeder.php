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
    public function run()
    {
        Category::insert([
            ['name' => 'Matematika', 'description' => 'Kategori Matematika'],
            ['name' => 'Biologi', 'description' => 'Kategori Biologi'],
            ['name' => 'Sejarah', 'description' => 'Kategori Sejarah'],
        ]);
    }
}
