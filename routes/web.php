<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/productos');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos', 'ProductController@index');

Route::get('/producto/{name}','ProductController@show');

Route::post('/agregarAlCarrito', 'CartProductController@store')->middleware('LoggedIn');

Route::get('/carrito', 'CartController@index')->middleware('LoggedIn');

Route::post('/eliminarDelCarrito', 'CartProductController@destroy');

Route::get('/comprar', 'CartController@finalizar')->middleware('LoggedIn');

Route::get('/historial','CartController@historial')->middleware('LoggedIn');

Route::get('/cuenta/{id}', 'UserController@show');

Route::get('/agregarProducto',function(){
    return view('addProduct');
})->middleware('Admin');

Route::post('/agregarProducto','ProductController@store');

Route::post('/eliminarProducto','ProductController@destroy');

Route::get('/editarProducto/{name}','ProductController@edit')->middleware('Admin');

Route::post('/editarProducto/{name}','ProductController@update');

/*
Route::get('/eliminarProducto',function(){
    echo("Qué haces aqui, picarón?");
});
*/
