<?php

namespace App\Http\Controllers\MUrid;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use App\Models\Material;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index() {
        $discussions = Discussion::with('user', 'material')->latest()->get();
        return view('murid.discussions.index', compact('discussions'));
    }

    public function create() {
        $materials = Material::where('approval_status', 'approved')->get();
        return view('murid.discussions.create', compact('materials'));
    }

    public function store(Request $request) {
        Discussion::create([
            'user_id' => auth()->id(),
            'material_id' => $request->material_id,
            'message' => $request->message,
        ]);
        return redirect()->route('discussions.index')->with('success', 'Diskusi dikirim');
    }

    public function destroy(Discussion $discussion) {
        $discussion->delete();
        return redirect()->route('discussions.index')->with('success', 'Diskusi dihapus');
    }
}
