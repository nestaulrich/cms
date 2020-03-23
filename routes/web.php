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
    return view('welcome');
});

// Route::get('/{id}', function($id) {
//     return "This is the id: " . $id;
// });

// Route::get('/post/{data}', 'PostController@index');
Route::resource('posts', 'PostController');

Route::get('/contact', 'PostController@contact');