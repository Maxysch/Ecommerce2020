<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/editProduct.css">
    <title>Agregar Producto</title>
</head>
<body>

    @include('header')
    <main>
        <div class="contForm">
            <h1>Agregar Producto</h1>
                <form class="form" action="/agregarProducto" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" name="name" value="" placeholder="nombre del producto...">
                <input type="numeric" name="price" value="" placeholder="precio del producto...">
                <input type="text" name="description" value="" placeholder="descripción del producto...">
                <input type="file" name="img">
                <button type="sumbit">Agregar producto</button>
            </form>
        </div>
    </main>
    @include('footer')
</body>
</html>