<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Material;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $teacher = Teacher::first();
        $category = Category::where('name', 'Matematika')->first();

        Material::create([
            'teacher_id' => $teacher->id,
            'category_id' => $category->id,
            'title' => 'Aljabar Dasar',
            'description' => 'Pengenalan konsep aljabar',
            'type' => 'ebook',
            'file_path' => 'uploads/ebook/aljabar.pdf',
            'approval_status' => 'approved',
        ]);
    }
}
