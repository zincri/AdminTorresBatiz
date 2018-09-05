<?php

/*
|--------------------------------------------------------------------------
| Web Routes Admin Page
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





/*
|--------------------------------------------------------------------------
| Web Routes Principal Page
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('product/{id}', function($id){
    $a=DB::table('tbl_productogeneral')->where('activo','=',1)->where('id','=',$id)->first();
    return redirect()->route('cart-add',$a);
});

Route::resource('/','InicioController');
Route::resource('/nosotros','NosotrosController');
Route::resource('/productos','ProductosController');
Route::resource('/noticias','NoticiasController');
Route::resource('/arrendamiento','ArrendamientoController');
Route::resource('/soporte','SoporteController');
Route::resource('/consumibles','ConsumiblesController');
Route::resource('/sucursales','SucursalesController');
Route::resource('/contacto','ContactoController');
Route::resource('/productostodos','productosTodosController');

Route::get('productostodosdetalle/{id}',[
    'as' => 'producto-detalle',
    'uses' => 'ProductosTodosDetalleController@Show'
]);


Route::post('cart/sendform',[
    'as' => 'cart-form',
    'uses' => 'CartController@store'
]);

Route::get('cart/show',[
'as' => 'cart-show',
'uses' => 'CartController@show'
]);

Route::get('cart/store',[
    'as' => 'cart-store',
    'uses' => 'CartController@store'
    ]);

Route::get('cart/add/{id}/{cantidad}',[
    'as' => 'cart-add',
    'uses' => 'CartController@add'
]);

Route::get('cart/refresh/{id}/{cantidad}', [
    'as' => 'cart-refresh',
    'uses' => 'CartController@refresh'
]);

Route::get('cart/delete/{id}',[
    'as' => 'cart-delete',
    'uses' => 'CartController@delete'
]);

Route::get('cart/empty/all',[
    'as' => 'cart-thrash',
    'uses' => 'CartController@vaciar'
]);

// Categorías routes
Route::get('productostodos/showProducts/{id}',[
    'as' => 'send-categoria',
    'uses' => 'productosTodosController@showProducts'
]);

// End Categorías routes