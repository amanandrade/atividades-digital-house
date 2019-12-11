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

//function anonima = não precisa nomear a função pq ela não será chamada
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/hellolaravel', function (){
//     return view('hello');
// });

Route::get('/produtos','ProdutoController@viewProdutos'); //@chama a função
Route::get('/index', 'HomeController@viewHome');