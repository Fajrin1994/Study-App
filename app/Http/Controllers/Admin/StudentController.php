<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        $students = Student::with('user')->get();
        return view('admin.students.index', compact('students'));
    }

    public function create() {
        $users = User::where('role', 'murid')->get();
        return view('admin.students.create', compact('users'));
    }

    public function store(Request $request) {
        Student::create($request->all());
        return redirect()->route('student.index')->with('success', 'Murid ditambahkan');
    }

    public function edit(Student $student) {
        $users = User::where('role', 'murid')->get();
        return view('admin.students.edit', compact('student', 'users'));
    }

    public function update(Request $request, Student $student) {
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Murid diperbarui');
    }

    public function destroy(Student $student) {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Murid dihapus');
    }
}
