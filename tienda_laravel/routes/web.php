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
    echo "Ola k ase??";
});
Route::get('/laravel', function () {
    return view("welcome");
});
Route::get('/table/{numero}', function ($numero) {
    for ($i = 1; $i <= 10; $i++) {
        echo "$i * $numero = " . $i * $numero . "<br>";
    }
});
Route::get('/saludo/{nombre?}', "Prueba@saludo");
Route::get('/adios', "Prueba@despedida");
Route::get('/suma/{a}/{b}',"Prueba@suma");

//Enrouta unas rutas estándar de CRUD al controlador
Route::resource ('/categorias','CategoriasController');
