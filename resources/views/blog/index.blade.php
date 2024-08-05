@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>
    @foreach ($posts as $post)
        <div>
            <h2><a href="{{ route('blog.show', ['post' => $post->id]) }}">{{ $post->title }}</a></h2>
            <p>{{ $post->excerpt }}</p>
        </div>
    @endforeach
@endsection
