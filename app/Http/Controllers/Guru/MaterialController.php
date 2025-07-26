<?php

namespace App\Http\Controllers\Guru;

use App\Models\Category;
use App\Models\Material;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('category', 'teacher.user')
            ->where('teacher_id', auth()->user()->teacher->id)
            ->whereIn('approval_status', ['rejected', 'pending'])
            ->get();
        $materials_approved = Material::with('category', 'teacher.user')
            ->where('teacher_id', auth()->user()->teacher->id)
            ->where('approval_status', 'approved')
            ->get();

        return view('guru.materials.index', compact('materials', 'materials_approved'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('guru.materials.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'file' => 'required|file', // <--- HARUS file, bukan file_path
            'category' => 'required|exists:categories,id',
        ]);

        $category = Category::find($request->category); // ambil nama kategori buat folder
        $file = $request->file('file');

        $fileName = time() . '_' . $file->getClientOriginalName();

        // Simpan file ke: public/internal/material/{{ $category->name }}
        $path = $file->storeAs(
            'internal/material/' . $category->name,
            $fileName,
            'public' // artinya disimpan di storage/app/public/...
        );

        Material::create([
            'teacher_id' => auth()->user()->teacher->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'file_path' => $path,
            'approval_status' => 'pending',
        ]);

        return redirect()->route('materials.index')->with('success', 'Materi berhasil ditambahkan!');
    }


    public function edit(Material $material)
    {
        $categories = Category::all();
        return view('guru.materials.edit', compact('material', 'categories'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|string',
            'category' => 'required|exists:categories,id',
            'file' => 'nullable|file' // file boleh kosong pas update
        ]);

        $category = Category::find($request->category);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'category_id' => $request->category,
            'approval_status' => 'pending', // reset approval
        ];

        // Cek apakah user upload file baru
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $path = $file->storeAs(
                'internal/material/' . $category->name,
                $fileName,
                'public'
            );

            $data['file_path'] = $path;
        }

        $material->update($data);

        return redirect()->route('materials.index')->with('success', 'Materi berhasil diperbarui!');
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materials.index')->with('success', 'Materi dihapus');
    }

    public function show($id)
    {
        $material = Material::with('category', 'teacher.user')->findOrFail($id);
        return view('guru.materials.preview.index', compact('material'));
    }
}
