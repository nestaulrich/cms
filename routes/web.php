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


// Raw SQL query format
Route::get('/insert', function() {
   DB::insert('insert into posts(title, body) values(?,?)', ['New Title', 'HERE is some new text']);

});


// Get info from database
Route::get('/read', function() {

$results = DB::select('select * from posts');
$print = '';
foreach($results as $result) {
    $print = $print. $result->title . "<br>";
}
return $print;
});

Route::get('/update', function() {
    $updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);
    return "Post Title has been updated " . $updated ;
});

Route::get('/destroy', function() {

    $result = DB::delete('delete from posts where id = ?', [4]);
    if ($result === 1) {
        return "Updated";
    } else {
        return "error";
    }


});



// Route::get('/{id}', function($id) {
//     return "This is the id: " . $id;
// });

// Route::get('/post/{data}', 'PostController@index');
// Route::resource('posts', 'PostController');

Route::get('/contact', 'PostController@contact');

Route::get('post/{id}/{name}/{login}', 'PostController@show_post');