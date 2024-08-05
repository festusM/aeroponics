@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $blogPost->title }}</h1>
    <p>{{ $blogPost->content }}</p>

    <h3>Comments</h3>
    @foreach($comments as $comment)
        <div class="comment">
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
        </div>
    @endforeach

    <!-- Comment Form -->
    @auth
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="blog_post_id" value="{{ $blogPost->id }}">
        <div class="form-group">
            <label for="content">Add a Comment:</label>
            <textarea id="content" name="content" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @else
    <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
    @endauth
</div>
@endsection
