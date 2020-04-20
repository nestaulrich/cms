<?php

use Illuminate\Support\Facades\Route;
use App\Post;
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

// ****************************************************************************
// Raw SQL query format
// ****************************************************************************
Route::get('/read', function() {
    $results = DB::select('SELECT * FROM posts ');
    return var_dump($results);
    // foreach($results as $result) {
    //     return $result->title;
    // }
});


// // Get info from database
// Route::get('/read', function() {

// $results = DB::select('select * from posts');
// $print = '';
// foreach($results as $result) {
//     $print = $print. $result->title . "<br>";
// }
// return $print;
// });

// Route::get('/update', function() {
//     $updated = DB::update('update posts set title = "Updated Title" where id = ?', [1]);
//     return "Post Title has been updated " . $updated ;
// });

// Route::get('/destroy', function() {

//     $result = DB::delete('delete from posts where id = ?', [4]);
//     if ($result === 1) {
//         return "Updated";
//     } else {
//         return "error";
//     }


// });



// // Route::get('/{id}', function($id) {
// //     return "This is the id: " . $id;
// // });

// // Route::get('/post/{data}', 'PostController@index');
// // Route::resource('posts', 'PostController');

// Route::get('/contact', 'PostController@contact');

// Route::get('post/{id}/{name}/{login}', 'PostController@show_post');





// ****************************************************************************
// Eloquent 
// ****************************************************************************

// Route::get('/read', function() {
// // Pulls all the methods from Posts controller
//     $posts = Post::all();
//     // $collection = [];
//     // foreach($posts as $post) {
//     //     array_push($post->title, $collection);
//     // }
//     // $count = count($collection);

//     return $posts;

// });

// Route::get('/find', function() {

//     $posts = Post::find(2);

//     return $posts->body;
// });

// Route::get('/findwhere', function() {
//     $posts = Post::where('id', 2)->get();
//     return $posts;
// });

// Route::get('/findmore', function() {
//     $posts = Post::findorfail(5);
//     return $posts->title;
// });