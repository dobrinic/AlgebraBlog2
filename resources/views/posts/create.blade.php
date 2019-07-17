@extends('layouts.master')

@section('content')
<div>
    <div>
        <h3>Kreiraj novu objavu</h3>
    </div>

    <hr>

    <div>
        <form action="{{ route('posts.store') }}" method="post">

            @csrf

            <div class="form-group">
                <label for="title">Naslov</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="title" name="title" value="{{ old('title')}}">
            </div>

            <div class="form-group">
                <label for="body">Post</label>
                <textarea class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"  name="body" id="body" cols="80" rows="10">{{ old('body')}}</textarea>
            </div>

            <div class="form-group">
                <a href="{{ route('posts.index') }}" class="btn btn-warning">Nazad</a>
                <button type="submit" class="btn btn-success float-right">Objavi</button>
            </div>
            
            @include('layouts.errors')
            
        </form>
    </div>
</div>
@endsection