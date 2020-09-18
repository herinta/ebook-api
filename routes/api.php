<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//oute::resource('books','BookController');
// Route::resource('books','BookController');
Route::get('/books', 'BookController@index');
Route::post('/books/create', 'BookController@store');
Route::post('/books/update/{id}', 'BookController@update');
Route::delete('/books/delete/{id}', 'BookController@destroy');

Route::resource('authors','AuthorController');