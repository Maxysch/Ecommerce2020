<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/record.css">
    <title>Historial de compras</title>
</head>
<body>

    @include('header')
    <main>
    <div class="cont">
        <h1>Compras realizadas</h1>
        <div class="compra">
            @forelse($carritosCerrados as $pedido)
            @php 
            $total= 0;
            @endphp
                <h3>Compra - {{$pedido->id}}</h3>
                <div class="info">
                    @foreach($pedido->products as $producto)
                    <p>{{$producto->name}} - ${{$producto->price}}</p>
                    @php 
                    $total= $total + e($producto->price);
                    @endphp
                    @endforeach
                    <p>Total= ${{$total}}</p>
                </div>

            @empty
            <h2>Aún no has comprado nada</h2> 
            @endforelse
        </div>
        </main>
    </div>
    @include('footer')
</body>
</html>