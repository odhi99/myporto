<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // search berdasarkan nama, pagination 10
        $abouts = About::where('id', 'like', '%' . request('id') . '%')
            ->orderBy('id', 'desc') //desc yg terakhir di input akan paling atas
            // ->orderBy('name', 'asc') //asc name berdasrkan urutan abjad
            ->paginate(10);
        return view('pages.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('pages.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'about' => 'required|string|max:255',
            'foto' => 'file|mimes:jpeg,png,jpg,gif|max:2048',


        ]);
        // dd($request);
        $random = strtoupper(Str::random($length = 7));
        $nama_image = $random . '_.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move('images_uploads', $nama_image);


        $validatedData['foto'] = $nama_image;


        About::create($validatedData);

        return redirect()->route('about.index')->with('success', 'Barang berhasil ditambahkan.');
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
    public function edit(About $about)
    {
        //
        return view('pages.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {

        $validatedData = $request->validate([
            'about' => 'required|string|max:255',
        ]);


        $data = About::findOrFail($about->id);

        // Menangani upload foto jika ada
        if ($request->hasFile('foto')) {
            if ($data->foto && file_exists(public_path('images_uploads/' . $data->foto))) {
                unlink(public_path('images_uploads/' . $data->foto)); // Menghapus foto lama
            }
            $random = strtoupper(Str::random($length = 7));
            $nama_image = $random . '_.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->move('images_uploads', $nama_image);

            // Menambahkan path foto ke dalam validated data
            $validatedData['foto'] = $nama_image;
        }

        // dd($request);


        $data->update($validatedData);

        return redirect()->route('about.index')->with('success', 'About berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
        // Pastikan field images bukan array, tapi string path
        if ($about->foto && File::exists(public_path('images_uploads/' . $about->foto))) {
            File::delete(public_path('images_uploads/' . $about->foto));
        }

        // Hapus project dari database
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About deleted!');
    }
}
