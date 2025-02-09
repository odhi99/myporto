<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //index
        $projects = Project::latest()->paginate(10);

        return view('pages.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $techOptions = [
            'laravel',
            'flutter',
            'react',
            'vue',
            'python',
            'tensorflow',
            'firebase',
            'nextjs',
            'typescript',
            'nodejs',
            'pytorch',
            'aws',
            'gcp',
            'mongodb',
            'expressjs',
            'go'
        ];
        return view('pages.project.create', compact('techOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:projects',
            'description' => 'required',
            // 'images' => 'required|array',
            'images' => 'image|mimes:jpeg,png,jpg|max:2048',
            'client_name' => 'nullable|string',  // Bisa dikosongkan
            'client_industry' => 'nullable|string', // Bisa dikosongkan
            'tech_stack' => 'required|array'
        ]);

        $random = strtoupper(Str::random($length = 7));
        $nama_image = $random . '_.' . $request->file('images')->getClientOriginalExtension();
        $request->file('images')->move('images_uploads/projek', $nama_image);

        $validated['images'] = $nama_image;

        Project::create($validated);
        return redirect()->route('project.index')->with('success', 'Project created!');
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
    public function edit(Project $project)
    {
        //
        $techOptions = [
            'laravel',
            'flutter',
            'react',
            'vue',
            'python',
            'tensorflow',
            'firebase',
            'nextjs',
            'typescript',
            'nodejs',
            'pytorch',
            'aws',
            'gcp',
            'mongodb',
            'expressjs',
            'go'
        ];
        return view('pages.project.edit', compact('project', 'techOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //

        // dd($request);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:projects',
            'description' => 'required',
            // 'images' => 'required|array',
            'images' => 'image|mimes:jpeg,png,jpg|max:2048',
            'client_name' => 'nullable|string',  // Bisa dikosongkan
            'client_industry' => 'nullable|string', // Bisa dikosongkan
            'tech_stack' => 'required|array'
        ]);

        $data = Project::findOrFail($project->id);


        // Menangani upload images jika ada
        if ($request->hasFile('images')) {
            if ($data->images && file_exists(public_path('images_uploads/projek' . $data->images))) {
                unlink(public_path('images_uploads/projek/' . $data->images)); // Menghapus images lama
            }
            $random = strtoupper(Str::random($length = 7));
            $nama_image = $random . '_.' . $request->file('images')->getClientOriginalExtension();
            $request->file('images')->move('images_uploads/projek', $nama_image);

            // Menambahkan path images ke dalam validated data
            $validated['images'] = $nama_image;

            $project->update($validated);
            return redirect()->route('project.index')->with('success', 'Project updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
