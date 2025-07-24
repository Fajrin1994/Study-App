<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index() {
        $materials = Material::with('category')->where('teacher_id', auth()->user()->teacher->id)->get();
        return view('guru.materials.index', compact('materials'));
    }

    public function create() {
        $categories = Category::all();
        return view('guru.materials.create', compact('categories'));
    }

    public function store(Request $request) {
        Material::create([
            'teacher_id' => auth()->user()->teacher->id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'file_path' => $request->file_path,
            'approval_status' => 'pending'
        ]);
        return redirect()->route('materials.index')->with('success', 'Materi ditambahkan');
    }
public function edit(Material $material) {
        $categories = Category::all();
        return view('guru.materials.edit', compact('material', 'categories'));
    }

    public function update(Request $request, Material $material) {
        $material->update($request->all());
        return redirect()->route('materials.index')->with('success', 'Materi diperbarui');
    }

    public function destroy(Material $material) {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Materi dihapus');
    }
}
