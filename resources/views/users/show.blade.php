@extends('layouts.master')

@section('content')

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="" alt="Card image cap">
        <div class="card-body">

            <h5 class="card-title">{{ $user->name }}</h5>

            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Kreiran: {{ $user->created_at }}</p>

            <a href="{{ route('users.index') }}" class="btn btn-primary">Nazad</a>
        </div>
    </div>
@endsection