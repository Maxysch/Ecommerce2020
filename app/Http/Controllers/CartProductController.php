<?php

namespace App\Http\Controllers;

use App\Cart_Product;
use App\Cart;
use Auth;
use App\Product;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $carritosActivos = Cart::where('user_id','=',Auth::user()->id)->where('status','=','activo')->get();

        //dd($carritosActivos);

        if($carritosActivos->isNotEmpty()){
  
            $cart_id = $carritosActivos['0']->id;
        }
        else{
            $carritoNuevo = new Cart;
            $carritoNuevo->user_id = Auth::user()->id;
            $carritoNuevo->status="activo";
            $carritoNuevo->save();
            $cart_id = $carritoNuevo->id;
        }
        
        $relacion = new Cart_Product;
        $relacion->cart_id = $cart_id;
        $relacion->product_id = $product_id;
        $relacion->save();

        return redirect('/productos');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function show(Cart_Product $cart_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart_Product $cart_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart_Product $cart_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart_Product  $cart_Product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $id)
    {
        $productos = Product::find($id);
        $producto = $productos["0"];
        $product_id = $producto['id'];

        $carritosActivos = Cart::where('user_id','=',Auth::user()->id)->where('status','=','activo')->get();
        $cart_id = $carritosActivos['0']->id;

        $relaciones= Cart_Product::where('cart_id','=',$cart_id)->where('product_id','=',$product_id)->get();
        $relacion = $relaciones['0'];
        $relacion->delete();

        return redirect('/carrito');
    }
}
