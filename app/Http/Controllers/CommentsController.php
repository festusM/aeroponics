<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'blog_post_id' => 'required|exists:blog_posts,id',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'blog_post_id' => $request->input('blog_post_id'),
        ]);

        return redirect()->route('blog.show', ['post' => $request->input('blog_post_id')])
                         ->with('success', 'Comment added successfully.');
    }
}
