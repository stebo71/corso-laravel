<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form di validazione</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Prova la Validazoine dei Dati</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('validateForm') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Età</label>
                <input type="age" class="form-control" name="age" id="age" value="{{ old('age') }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}">
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Conferma Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
            </div>

            <button type="submit" class="btn btn-primary">Invia</button>

        </form>
    </div>
    
</body>
</html>