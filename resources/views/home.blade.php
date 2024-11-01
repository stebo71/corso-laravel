@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Homepage</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif


        @auth
        <p>Ciao, {{ auth()->user()->name }}!</p>

        @if (auth()->user()->profile_image)
        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="" width="150">
        @endif

        <form action="{{ route('upload.image') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="profile_image">Carica la tua immagine</label>
            <input type="file" name="profile_image" id="profile_image" required>
            <button type="submit">Carica Immagine</button>
        </form>




        <form action="{{ route('logoutUser') }}" method="post" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        @else
        <a href="{{ route('loginUser') }}" class="btn btn-primary">Login</a>
        @endauth
    </div>
@endsection