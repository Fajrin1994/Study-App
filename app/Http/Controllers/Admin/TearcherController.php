<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        $guru = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        Teacher::create([
            'user_id' => $guru->id,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'mapel' => $request->mapel,
        ]);
        return redirect()->route('teacher.index')->with('success', 'Guru ditambahkan');
    }

    public function edit(Teacher $teacher) {
        $user = User::where('id' , $teacher->user_id)->get();
        return view('admin.teachers.edit', compact('teacher', 'user'));
    }

    public function update(Request $request, Teacher $teacher) {
        $teacher->update($request->all());
        return redirect()->route('teacher.index')->with('success', 'Guru diperbarui');
    }

    public function destroy(Teacher $teacher) {
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'Guru dihapus');
    }
}
