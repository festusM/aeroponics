<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        Comment::create([
            'content' => 'This is a comment for Blog Post 1',
            'user_id' => 2, // Assuming user ID 2 exists
            'blog_post_id' => 1, // Assuming blog post ID 1 exists
        ]);

        Comment::create([
            'content' => 'This is a comment for Blog Post 2',
            'user_id' => 1, // Assuming user ID 1 exists
            'blog_post_id' => 2, // Assuming blog post ID 2 exists
        ]);
    }
}
