<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TearcherController extends Controller
{
    public function index() {
        $teachers = Teacher::with('user')->get();
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create() {
        $users = User::where('role', 'guru')->get();
        return view('admin.teachers.create', compact('users'));
    }

    public function store(Request $request) {
        Teacher::create($request->all());
        return redirect()->route('teachers.index')->with('success', 'Guru ditambahkan');
    }

    public function edit(Teacher $teacher) {
        $users = User::where('role', 'guru')->get();
        return view('admin.teachers.edit', compact('teacher', 'users'));
    }

    public function update(Request $request, Teacher $teacher) {
        $teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success', 'Guru diperbarui');
    }

    public function destroy(Teacher $teacher) {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Guru dihapus');
    }
}
