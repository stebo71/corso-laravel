@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Homepage</h1>

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tasto logout -->
        @auth
        <form action="{{ route('logoutUser') }}" method="post" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        @else
        <a href="{{ route('loginUser') }}" class="btn btn-primary">Login</a>
        @endauth
    </div>
@endsection