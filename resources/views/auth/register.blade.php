<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/register.css">
    <title>Registro</title>
</head>
<body>
@include('header')
<main>
    <div class="contForm">
        <h1>Registrate</h1>
        <form class="formularioRegister" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
                <label for="name">Nombre:</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif

                <label for="surname">Apellido:</label>
                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required>


                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                @endif

                <label for="email">E-Mail:</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif


                <label for="password">Contraseña:</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

                <label for="password-confirm">Confrimar contraseña:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <button type="submit" class="btn btn-primary">
                    Registrate
                </button>
        </form>
        <a href="/login">¿Ya tiene un usuario?</a>
    </div>
</main>
@include('footer')
</body>
</html>


