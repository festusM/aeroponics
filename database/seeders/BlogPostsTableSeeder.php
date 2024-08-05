<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogPost;

class BlogPostsTableSeeder extends Seeder
{
    public function run()
    {
        BlogPost::create([
            'title' => 'Blog Post 1',
            'content' => 'Content for Blog Post 1',
            'user_id' => 1, // Assuming user ID 1 exists
        ]);

        BlogPost::create([
            'title' => 'Blog Post 2',
            'content' => 'Content for Blog Post 2',
            'user_id' => 2, // Assuming user ID 2 exists
        ]);
    }
}
