@extends('layouts.master')

@section('content')

<div class="blog-post">

    <h2 class="blog-post-title">
        {{ $post->title }}
    </h2>

    <p class="blog-post-meta">
        {{ $post->created_at->toFormattedDateString() }} by <a href="#">Mark</a>
    </p>

    <article class="text-justify">
        {{ $post->body }}
    </article>

</div>

@endsection