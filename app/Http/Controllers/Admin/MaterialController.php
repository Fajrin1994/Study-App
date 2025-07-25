<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index() {
    $materials = Material::with('category', 'teacher.user')
        ->whereIn('approval_status', ['pending', 'rejected'])
        ->get();

    $materials_approved = Material::with('category', 'teacher.user')
        ->where('approval_status', 'approved')
        ->get();

    return view('admin.materials.index', compact('materials', 'materials_approved'));
}
}
