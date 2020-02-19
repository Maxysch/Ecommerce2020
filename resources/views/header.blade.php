<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/general.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="log">

            @if(Auth::user()==null)
            <a href="login">Inciar Sesión</a>  
            <a href="register">Registrarse</a>
            @else
            <p class="welcome">Bienvenido {{Auth::user()->name}}</p>
            @endif


        </div>
        <div class="navegacion">
            <a href="/"><img src="/logo.png" alt="logo"></a>
            <nav>
            <a  href="/productos">Productos</a>
            @if(Auth::user())
            <a  href="/cuenta/{{Auth::user()->id}}">Mi cuenta</a>
            @else 
            <a href="/login">Iniciar sesión</a>
            @endif
            <a  href="/">Preguntas frecuentes</a>
            </nav>
            <div class="busqueda">
            <input type="search" id="buscar" name="q" placeholder="Currently not working" size="30">
            <button>Buscar</button>
            </div>
        </div>
    </header>

</body>
</html>