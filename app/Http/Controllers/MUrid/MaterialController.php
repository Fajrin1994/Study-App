<?php

namespace App\Http\Controllers\MUrid;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentCourseLog;

class MaterialController extends Controller
{
    public function index()
    {
        $materials_approved = Material::with('category', 'teacher.user')
            ->where('approval_status', 'approved')
            ->get();

        return view('murid.materials.index', compact('materials_approved'));
    }

    public function show($id)
    {
        $material = Material::with('category', 'teacher.user')->findOrFail($id);

        // Cek kalau user login sebagai student
        if (auth()->check() && auth()->user()->role === 'student') {
            $studentId = auth()->user()->student->id;

            // Cek apakah log sudah ada
            $existingLog = StudentCourseLog::where('student_id', $studentId)
                ->where('material_id', $material->id)
                ->first();

            // Kalau belum ada, buat log baru
            if (!$existingLog) {
                StudentCourseLog::create([
                    'student_id' => $studentId,
                    'material_id' => $material->id,
                    'status' => 'belum_selesai',
                    'completed_at' => null,
                ]);
            }
        }

        return view('murid.materials.preview.index', compact('material'));
    }

    public function myMaterials()
    {
        $student = auth()->user()->student;

        // Ambil semua log milik siswa yg udah buka materi
        $materialIds = StudentCourseLog::where('student_id', $student->id)
            ->pluck('material_id');

        // Ambil materi berdasarkan ID yang pernah dibuka, dan statusnya approved
        $materials_approved = Material::with('category', 'teacher.user')
            ->whereIn('id', $materialIds)
            ->where('approval_status', 'approved')
            ->get();

        return view('murid.my_materials.index', compact('materials_approved'));
    }
}
