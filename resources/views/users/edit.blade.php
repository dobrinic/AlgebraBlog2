@extends('layouts.master')

@section('content')

<div class="card">
        <div class="card-header">Uredi korisnika</div>
        <img class="card-img-top" src="https://png.pngtree.com/svg/20170602/0db185fb9c.svg" style="width: 200px;" alt="Card image cap">
        <div class="card-body">

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PATCH')
               
                <div class="form-group">
                    <label for="name">Ime</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" value="{{ $user->name }}">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" value="{{ $user->email }}">
                </div>

                <div class="form-group">
                    <label for="password">Lozinka</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" placeholder="Ostavite prazno ukoliko ne želite mijenjati lozinku.">
                </div>

                <div class="form-group">
                    <a href="{{ route('users.index') }}" class="btn btn-warning">Nazad</a>
                    <button type="submit" class="btn btn-success float-right">Promjeni</button>

                </div>

                @include('layouts.errors')

            </form>

        </div>
    </div>

@endsection