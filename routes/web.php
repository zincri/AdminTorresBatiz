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

Auth::routes(); //ruta cargar auth
Route::get('administrador', function() { //ruta login
    if(Auth::check()){
        return redirect('administrador/home');
    }
    return view('auth.login');
});
//Route::post('administrador/logout','Auth\LoginController@logout')->name('logout');
Route::post('administrador/login', 'Auth\LoginController@index')->name('administrador-login'); //ruta para iniciar sesion post
Route::get('administrador/home','HomeController@index')->name('administrador-home'); //ruta para ir al home admin
Route::resource('administrador/informacion','InformacionController');
Route::resource('administrador/listaservicios','ListaServiciosController');
Route::resource('administrador/slider','SliderController');
Route::resource('administrador/categorias','CategoriasController');
Route::resource('administrador/productos','AdminProductosController');
Route::resource('administrador/galeria','GaleriaController');
Route::get('administrador/galeria/producto/{id}','GaleriaController@galeria');