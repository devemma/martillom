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

Route::get('/', 'HomeController@index');
/*Route::get('/',function(){
    return view('auth.register');
});*/

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('ajaxproducts','Product');
    Route::resource('ajaxproveedor','ProveedorController');
    Route::resource('ajaxcompra','CompraController');
    Route::resource('ajaxventa','VentaController');
    Route::get('reportes',function(){
        return view('reportes');
    });
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/producto/{id}','ComprasVentas@ver_producto');
Route::get('/proveedor/{id}','ComprasVentas@ver_proveedor');
Route::get('/precio/{id}','ComprasVentas@precio');
Route::get('/proveedores','ComprasVentas@proveedores');
Route::get('/productos','ComprasVentas@productos');

