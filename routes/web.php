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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/prueba', 'PruebaController@index')->name('prueba');
Route::get('/prueba/saludo/{nombre}', 'PruebaController@saludo')->name('prueba_saludo');
Route::get('/prueba/vista', 'PruebaController@mostrarVista')->name('prueba_vista');
Route::get('/prueba/envia/datos', 'PruebaController@enviarDatos')->name('prueba_datos');
Route::get('/prueba/blade', 'PruebaController@plantillaBlade')->name('prueba_blade');

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){
    Route::get('/home', 'admin\HomeController@index')->name('home');
    // RUTAS RESTFULL USER
    Route::resource('user', 'admin\UserController');
    Route::get('user/{id}/destroy', 'admin\UserController@destroy')->name('user.destroy');
    // RUTAS RESTFULL GENEROS
    Route::resource('genero', 'admin\GeneroController');
    Route::get('genero/{id}/destroy', 'admin\GeneroController@destroy')->name('genero.destroy');
    // RUTAS RESTFULL DIRECTORES
    Route::resource('director', 'admin\DirectorController');
    Route::get('director/{id}/destroy', 'admin\DirectorController@destroy')->name('director.destroy');
    // RUTAS RESTFULL PELICULAS
    Route::resource('pelicula', 'admin\PeliculaController');
    Route::get('pelicula/{id}/destroy', 'admin\PeliculaController@destroy')->name('pelicula.destroy');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout');
