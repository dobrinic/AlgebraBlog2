@extends('layouts.master')

@section('content')

<div class="blog-post">

    <h2 class="blog-post-title">
        {{ $post->title }}
    </h2>

    <p class="blog-post-meta">
        {{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }}</a>
    </p>

    <article class="text-justify">
        {{ $post->body }}
    </article>

</div>

<form action="" method="post">
    <div class="float-right">
        <a href="" class="btn btn-info">Uredi</a>
        <button class="btn btn-danger">Obriši</button>
    </div>
<a href="" class="btn btn-primary">Natrag</a>
</form>

@endsection