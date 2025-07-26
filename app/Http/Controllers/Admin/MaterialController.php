<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('category', 'teacher.user')
            ->whereIn('approval_status', ['pending', 'rejected'])
            ->get();

        $materials_approved = Material::with('category', 'teacher.user')
            ->where('approval_status', 'approved')
            ->get();

        return view('admin.materials.index', compact('materials', 'materials_approved'));
    }

    public function approve(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->approval_status = 'approved';
        $material->save();

        return redirect()->route('adminmaterial.index')->with('success', 'Material approved successfully.');
    }

    public function reject(Request $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->approval_status = 'rejected';
        $material->save();

        return redirect()->route('adminmaterial.index')->with('success', 'Material rejected successfully.');
    }

    public function show($id)
    {
        $material = Material::with('category', 'teacher.user')->findOrFail($id);
        return view('admin.materials.preview.index', compact('material'));
    }
}
