<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Blog;
use App\Models\Project; // Tambahkan model Project
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data About (tentang saya)
        $about = About::first();

        // Ambil semua proyek yang sudah dibuat oleh admin
        $projects = Project::latest()->get(); // Ambil semua data proyek, urutkan dari terbaru

        $blogs = Blog::latest()->get();

        // Kirim data ke halaman utama
        return view('pages.home', compact('about', 'projects', 'blogs'));
    }
}
