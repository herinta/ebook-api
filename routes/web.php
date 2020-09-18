<?php

use Illuminate\Support\Facades\Route;

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
    return view('XII RPL 2');
});

Route::get('/me', 'AuthController@me');
Route::get('/books', 'BookController@index');


Route::post('/books/create', 'BookController@store');


Route::post('/books/update/{id}', 'BookController@update');

Route::delete('/books/delete/{id}', 'BookController@destroy');

Route::get('/kontrol', function () {
    return "latihan control";
});

Route::resource('authors', 'AuthorController');