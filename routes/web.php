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

Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');//editar los registros
Route::post('/cart', 'CartDetailController@store');//editar lo
Route::delete('/cart', 'CartDetailController@destroy');//editar lo
Route::post('/order', 'CartController@update');//editar lo

Route::middleware(['auth', 'admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products', 'ProductController@index');//listar
    Route::get('/products/create', 'ProductController@create');//formulario
    Route::post('/products', 'ProductController@store');//registrar
    Route::get('/products/{id}/edit', 'ProductController@edit');//editar los registros
    Route::post('/products/{id}/edit', 'ProductController@update');//actualizar
    Route::post('/products/{id}/delete', 'ProductController@destroy');//eliminar form  
    Route::get('/products/{id}/images', 'ImageController@index');//registrar imagenes
    Route::post('/products/{id}/images', 'ImageController@store');//formulario
    Route::delete('/products/{id}/images', 'ImageController@destroy');//Eliminar imagenes
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//registrar imagenes
    
    });

   // Route::get('/admin/products', 'ProductController@index');//listar
   // Route::get('/admin/products/create', 'ProductController@create');//formulario
   // Route::post('/admin/products', 'ProductController@store');//registrar
   // Route::get('/admin/products/{id}/edit', 'ProductController@edit');//editar los registros
   // Route::post('/admin/products/{id}/edit', 'ProductController@update');//actualizar
   // Route::post('/admin/products/{id}/delete', 'ProductController@destroy');//eliminar form  
   // Route::get('/admin/products/{id}/images', 'ImageController@index');//registrar imagenes
   // Route::post('/admin/products/{id}/images', 'ImageController@store');//formulario
   // Route::delete('/admin/products/{id}/images', 'ImageController@destroy');//Eliminar imagenes
  
