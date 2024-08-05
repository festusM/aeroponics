<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\Comment; // Assuming you have a Comment model

class BlogPostController extends Controller
{
    /**
     * Display a listing of the blog posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPost::all(); // Retrieve all blog posts
        return view('blog.index', compact('posts')); // Pass posts to the view
    }

    /**
     * Display the specified blog post.
     *
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    /***public function show(BlogPost $post)
    {
        $comments = $post->comments()->get(); // Retrieve comments related to the post
        return view('blog.show', compact('post', 'comments')); // Pass post and comments to the view
    } */
    public function show($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $comments = $blogPost->comments; // Fetch comments related to the blog post

        return view('blog.show', compact('blogPost', 'comments'));
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $post
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, BlogPost $post)
    {
        $request->validate([
            'content' => 'required|string|max:500',
        ]);

        $comment = new Comment();
        $comment->content = $request->input('content');
        $comment->user_id = auth()->id(); // Assuming comments are linked to authenticated users
        $comment->blog_post_id = $post->id;
        $comment->save();

        return redirect()->route('blog.show', ['post' => $post->id])
                         ->with('success', 'Comment added successfully!');
    }
    
}




