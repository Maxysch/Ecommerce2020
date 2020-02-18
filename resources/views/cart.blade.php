<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cart.css">
    <title>Carrito</title>
</head>
<body>
    @include ('header')
    <main>
        @php 
        $total= 0;
        @endphp
        <div class="contCart">
            <h1>Carrito</h1>
            <div class="box">
                <?php $contador = 0;?>
                @forelse($carritoActual->products as $producto)
                        <h3>{{$producto->name}}</h3>
                        <p>${{$producto->price}}</p>
                    <form class="form" action="/eliminarDelCarrito" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="product_id" value="{{$producto->id}}">
                    <button class="boton" type="submit">Eliminar</button>
                    </form>
                    @php 
                    $total= $total + e($producto->price);
                    $contador = $contador + 1;
                    @endphp

                @empty
                    <div class="empty">
                        <h2>Aun no has comprado nada.</h2>
                        <form action="/productos">
                        <button class="boton important" class="important" type="submit">Nuestros Productos</button>
                        </form>
                    </div>
                @endforelse

                @if($contador != 0)
                <style>
                    .box{
                        height:auto;
                    }
                </style>
                    <h3>Total= {{$total}}</h3>
                    <form action="/comprar">
                        <button class="boton important" type="submit">COMPRAR</button>
                    </form>
                @endif
            </div>

        

        </div>
    </main>
    @include ('footer')
</body>
</html>