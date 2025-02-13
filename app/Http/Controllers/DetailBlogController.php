<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DetailBlogController extends Controller
{
    public function index($id)
    {
        $detail = Blog::find($id);

        // Ambil 5 post terbaru, kecuali yang sedang ditampilkan
        $recent_posts = Blog::where('id', '!=', $id)->latest()->take(5)->get();

        return view('pages.detail-blog', compact('detail', 'recent_posts'));
    }
}
