<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/products.css">
    <title>Productos</title>
</head>
<body>

    @include('header')

    <main>
        <h2>Ver todos los productos</h2>
        <div class="listado">
        @forelse($productos as $producto)

            <div class="producto">
                <div class="principal">
                    <img src="/storage/{{$producto->img}}" alt="">
                
                    <h3>{{$producto->name}}</h3>
                </div>
                <div class="secundaria">
                    <p>${{$producto->price}}</p>
                    <p>{{$producto->description}}</p>
                </div>

                <div class="acciones">
                    <form action="/agregarAlCarrito" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="product_id" value="{{$producto->id}}">
                        <button type="sumbit">Agregar al carrito</button>
                    </form>

                    <form action="/producto/{{$producto->name}}" method="GET">
                        <button type="sumbit">Ver producto</button>
                    </form>
                </div>
            </div>

        @empty

        No hay productos cargados aún

        @endforelse
        </div>
    </main>

    @include('footer')

</body>
</html>