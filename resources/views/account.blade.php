<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/account.css">
    <title>Document</title>
</head>
<body>
    @include('header')
    <main>
        <div class="contUser">
            <h1>Mi cuenta</h1>
            <h3>{{$usuario->name}}</h3>
            <h3>{{$usuario->surname}}</h3>
            <h3>{{$usuario->email}}</h3>
            <form action="/carrito">
                <button class="boton" type="submit">Carrito</button>
            </form>
            <form action="/historial">
                <button class="boton" type="submit">Mis pedidos</button>
            </form>
            @if($usuario->type=="admin")
            <form action="/agregarProducto" method="get">
            <button class="boton" type="submit">Producto nuevo</button>
            </form>
            @endif
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                Cerrar sesión
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>

        </div>
    </main>
    @include('footer')
</body>
</html>