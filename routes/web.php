<?php

use Illuminate\Support\Facades\Route;
// These are the Models we're using here
use App\Post;
use App\User;
use App\Role;
use App\Country;
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
// Route::get('/read', function() {
//     $results = DB::select('SELECT * FROM posts ');
//     return var_dump($results);
//     // foreach($results as $result) {
//     //     return $result->title;
//     // }
// });


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

Route::get('/create', function() {
    $post = new Post;
    $post->title = "I created a title";
    $post->body = "I created some body content";

    $post->save();

});

Route::get('/read', function() {

    $posts = Post::all();
    $titles = '';
    foreach($posts as $post) {
        $titles = $titles .$post->title . '<br>';
    }
    return $titles;

});

// Route::get('/find', function() {
//     //find() returns an object
//     $post = Post::find(1);
//     return $post->title;

// });

// Route::get('/findwhere', function() {
//     //get() returns a collection. To access a title you need to iterate
//     $post = Post::where('id', 2)->get();

//     foreach($post as $item) {
//         return $item->body;
//     }

// });

// Route::get('/findmore', function() {
//     $post = Post::findOrFail(5);
//     return $post;
// });

// Route::get('/basicinsert', function() {
//     //Instantiate the Posts model
//     $post = new Post;
//     $post->title = "Basic insert title";
//     $post->body = "New basic insert body content.";

//     $post->save();
// });

// // Create data
// Route::get('/createdata', function() {

//     Post::create(['title'=>'the create method', 'body'=>'the create method body']);

// });

// Route::get('/basicupdate', function() {
// $post = Post::find(2);
// $post->title = "Updated title for post 2";
// $post->save();
// });

// // Use the update method
// Route::get('/update', function() {

//     Post::where('id', 1)->where('is_admin', 0)->update(['title'=>'This new title', 'body'=>'This body and title were updated by the update method']);

// });

// //Delete stuff
// Route::get('/delete', function() {

//     $post = Post::find(1)->delete();

// });

// Route::get('/anotherdelete', function() {
//     //Seems like it only works with an array
//     Post::destroy([2,3]);
// });

// //Soft Deleting
// Route::get('/softdelete', function() {
//     Post::find(5)->delete();
// });


// //Read sofdeleted entries
// Route::get('/readsoftdelete', function() {
//     // Wont work because 4 is deleted
//     // return $post = Post::find(4);

//     //Will return something that has been soft deleted
//     // return Post::withTrashed()->where('id', 4)->get();

//     return Post::onlyTrashed()->get();
// });

// // Restoring soft deleted entries

// Route::get('/restore', function() {

//     Post::onlyTrashed()->restore();

// });

// Route::get('forcedelete', function() {
//     Post::find(4)->forceDelete();
// });

// ***************************************
// ***  Eloquent Relationships   *********
// ***************************************

// Has 1; 1 to 1 relationships
Route::get('user/{id}/post', function($id) {
    return User::find($id)->post;
});


Route::get('post/{id}/user', function($id){
return Post::find($id)->user->name;

});