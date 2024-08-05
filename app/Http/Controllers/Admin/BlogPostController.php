<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function create()
    {
        return view('admin.blog_posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        BlogPost::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('admin.blog_posts.index');
    }

    // Add other methods (index, edit, update, delete) as needed
}

