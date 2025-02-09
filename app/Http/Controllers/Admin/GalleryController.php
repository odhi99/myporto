<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $galleries = Gallery::with('project')->paginate(10);
        return view('pages.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['projects'] = Project::all();
        // dd($data);
        return view('pages.gallery.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $validated = $request->validate([
            'projects_id' => 'required|numeric|exists:projects,id',
            'image' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $random = strtoupper(Str::random($length = 7));
        $nama_image = $random . '_.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move('images_uploads/projek', $nama_image);

        $validated['image'] = $nama_image;
        // dd($request);

        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Gallery created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
        // Pastikan field images bukan array, tapi string path
        if ($gallery->image && File::exists(public_path('images_uploads/projek/' . $gallery->image))) {
            File::delete(public_path('images_uploads/projek/' . $gallery->image));
        }

        // Hapus project dari database
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Gallery deleted!');
    }
}
