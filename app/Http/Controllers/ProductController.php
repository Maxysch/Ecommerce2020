<?php

namespace App\Http\Controllers;

use App\Product;
use Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user()->type);
        $productos = Product::all();
        return view('products',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            "name" => "required|string",
            "price" => "required|integer",
            "description" => "required|string",
            //"img" => "required"
        ];

        $messages=[
            "required" => "El campo :attribute es obligatorio",
            "string" => "El campo :attribute debe ser un texto",
            "integer" => "El campo :attribute debe ser un número"
        ];

        $this->validate($request, $rules, $messages);



        $productoNuevo = new Product();

        $ruta = $request->file("img")->store("public");
        $nombreArchivo = basename($ruta);

        $productoNuevo->img = $nombreArchivo;
        $productoNuevo->name = $request["name"];
        $productoNuevo->price = $request["price"];
        $productoNuevo->description = $request["description"];

        $productoNuevo->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $productos = Product::where('name','=',$name)->get();

        if($productos->isNotEmpty()){

            $producto = $productos['0'];
            return view('product',compact('producto'));

        }
        else{
            return redirect('/');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $productos = Product::where('name','=',$name)->get();
        if($productos->isNotEmpty()){

            $producto = $productos['0'];

            return view('editProduct',compact('producto'));
        }
        else{
            return redirect('/');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name)
    {
        $productos = Product::where('name', "=", $request["name"])->get();
        $producto = $productos['0'];

        $producto->name = $request["name"];
        $producto->price = $request["price"];
        $producto->description = $request["description"];

        if($request->file('img') != null){
            $ruta = $request->file('img')->store('public');
            $nombreArchivo = basename($ruta);
            $producto->img = $nombreArchivo;
        }

        $producto->save();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $product)
    {
        $productos = Product::where('name', "=", $product["name"])->get();
        $producto = $productos['0'];

        $producto->delete();

        return redirect('/productos');
    }
}
