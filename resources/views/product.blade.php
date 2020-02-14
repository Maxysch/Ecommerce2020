<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/product.css">
    <title>Producto</title>
</head>
<body>

    @include('header')

    <main>
        <div class= "producto">
            <div class="info">
                <div class="principal">
                    <h1>{{$producto->name}}</h1>
                    <h3>${{$producto->price}}</h3>
                </div> 
                <div class="secundaria">
                    <p>{{$producto->description}}</p>
                </div> 
            </div>
            <img src="/storage/{{$producto->img}}" alt="">
        </div>
        <div class="contBotonera">
            <form action="/agregarAlCarrito" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="product_id" value="{{$producto->id}}">
                <button class="boton"  type="sumbit">Agregar al carrito</button>
            </form>
            @if(Auth::user()!=null)
            @if(Auth::user()->type=="admin")
            <form action="/editarProducto" method="GET">
            <button class="boton" type="submit">Editar producto</button>
            </form>
            <form action="/eliminarProducto" method="POST">
            {{csrf_field()}}

            <input type="hidden" name="name" value="{{$producto->name}}">
            <button class="boton" type="submit">Eliminar producto</button>
            </form>
            @endif
            @endif
        </div>

    </main>

    @include('footer')
</body>
</html>