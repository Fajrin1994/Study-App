<?php

namespace Database\Seeders;

use App\Models\Material;
use App\Models\Student;
use App\Models\StudentCourseLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentCourseLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $student = Student::first();
        $material = Material::first();

        StudentCourseLog::create([
            'student_id' => $student->id,
            'material_id' => $material->id,
            'status' => 'selesai',
            'completed_at' => now(),
        ]);
    }
}
