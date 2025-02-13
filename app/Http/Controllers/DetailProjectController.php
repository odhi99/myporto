<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class DetailProjectController extends Controller
{
    public function index($id)
    {
        // Cari project berdasarkan ID
        $detail = Project::with('galleries')->findOrFail($id);

        return view('pages.detail-projek', compact('detail'));
    }
}
