<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <title>LogIn</title>
</head>
<body>

@include('header')
    <main>
        <div class="contForm">
            <h1>Ingresa a tu cuenta</h1>
            <form class="formularioLogIn" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <label for="email">Email:</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                <label for="password">Contraseña:</label>
                <input id="password" type="password" class="form-control" name="password" required>
                <div class="rmbr">
                <p>Recuerdame</p><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                </div>
                <button class="boton" type="submit" class="btn btn-primary">
                    Conectarme
                </button>

                <a class="btn btn-link" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>
            </form>

            <form class="form" action="/register">
            <button class="boton important" type="submit">¿Aún no tienes cuenta?</button>
            </form>
        </div>
    </main>
@include('footer')
</body>
</html>

