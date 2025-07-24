<?php

namespace App\Http\Controllers\MUrid;

use App\Http\Controllers\Controller;
use App\Models\StudentCourseLog;
use Illuminate\Http\Request;

class StudentLogController extends Controller
{
    public function store(Request $request) {
        $student_id = auth()->user()->student->id;

        StudentCourseLog::updateOrCreate(
            ['student_id' => $student_id, 'material_id' => $request->material_id],
            ['status' => $request->status, 'completed_at' => now()]
        );

        return back()->with('success', 'Progres materi diperbarui');
    }
}
