@extends('layouts.master')

@section('content')
    <h1 class="blog-post-title">User: {{ $user->name }}</h1>
    @foreach($user->posts as $post)
        <div class="blog-post">
            <h2 class="blog-post-title"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>
            <p>{{ $post->body }}</p>
        </div><!-- /.blog-post -->
    @endforeach

@endsection