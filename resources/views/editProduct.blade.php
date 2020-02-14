<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/editProduct.css">
    <title>Document</title>
</head>
<body>

    @include('header')
    <main>
        <div class="contForm">
            <h1>Editar {{$producto->name}}</h1>
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="text" name="name" value="{{$producto->name}}">
                <input type="integer" name="price" value="{{$producto->price}}">
                <input type="text" name="description" value="{{$producto->description}}">
                <input type="file" name="img">
                <button type="submit">Editar</button>
            </form>
        </div>  
    </main>
    @include('footer')
</body>
</html>