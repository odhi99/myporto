<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('pages.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.blog.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required|max:225',
            'meta_description' => 'nullable|string|max:500',
            'content' => 'required',
            'tech_stack' => 'nullable|string',
            'code_snippets' => 'nullable|string',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'publish_date' => 'required|date'
        ]);

        if ($request->hasFile('thumbnail')) {
            $nama_image = strtoupper(Str::random(7)) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path('images_uploads/thumbnail'), $nama_image);
            $validated['thumbnail'] = $nama_image;
        }

        // Konversi string JSON ke array
        $validated['tech_stack'] = json_decode($request->input('tech_stack', '[]'), true);
        $validated['code_snippets'] = json_decode($request->input('code_snippets', '[]'), true);

        // dd($request->all(), $validated);
        Blog::create($validated);
        return redirect()->route('blog.index')->with('success', 'Blog created!');
    }

    public function edit(Blog $blog)
    {
        return view('pages.blog.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:225',
            'meta_description' => 'nullable|string|max:500',
            'content' => 'required',
            'tech_stack' => 'nullable|array',
            'code_snippets' => 'nullable|array',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'publish_date' => 'required|date'
        ]);

        if ($request->hasFile('thumbnail')) {
            if (File::exists(public_path('images_uploads/thumbnail/' . $blog->thumbnail))) {
                File::delete(public_path('images_uploads/thumbnail/' . $blog->thumbnail));
            }

            $nama_image = strtoupper(Str::random(7)) . '.' . $request->file('thumbnail')->getClientOriginalExtension();
            $request->file('thumbnail')->move(public_path('images_uploads/thumbnail'), $nama_image);
            $validated['thumbnail'] = $nama_image;
        }

        $validated['tech_stack'] = json_encode($request->input('tech_stack', []));
        $validated['code_snippets'] = json_encode($request->input('code_snippets', []));

        $blog->update($validated);
        return redirect()->route('blog.index')->with('success', 'Blog updated.');
    }
}
