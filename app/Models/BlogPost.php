<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts'; // Explicitly specify the table name

    protected $fillable = [
        'title',
        'content',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
