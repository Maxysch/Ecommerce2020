<?php

namespace App\Http\Controllers;

use App\Cart;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritosActivos = Cart::where('user_id','=',Auth::user()->id)->where('status','=','activo')->get();

        if($carritosActivos->isNotEmpty()){
  
            $carritoActual = $carritosActivos['0'];
        }
        else{
            $carritoActual = new Cart;
            $carritoActual->user_id = Auth::user()->id;
            $carritoActual->status="activo";
            $carritoActual->save();
        }

        //dd($carritoActual);

        return view('cart',compact('carritoActual'));
    }

    public function finalizar()
    {
        //Revisar qué hace cuando no tengo carritos activos

        $carritosActivos = Cart::where('user_id','=',Auth::user()->id)->where('status','=','activo')->get();

        $carritoActual = $carritosActivos['0'];

        $carritoActual->status="finalizado";
        $carritoActual->save();

        return redirect('/productos');
    }

    public function historial()
    {
        $carritosCerrados = Cart::where('user_id','=',Auth::user()->id)->where('status','=','finalizado')->get();

        //dd($carritosCerrados['0']);
        return view('record',compact('carritosCerrados'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
