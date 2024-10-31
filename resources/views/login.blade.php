<!-- @extends('layouts.app') -->

        @section('content')
        <div class="container mt-5">
            <h1>Login Utente</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

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
        
        <form action="{{ route('loginUser') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Login</button>

            </form>
        </div>
        @endsection
        @endauth