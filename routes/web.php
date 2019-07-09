<?php

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
/*
Route::get('/', function () {

    // $posts = DB::table('posts')->get();

    $posts = Post::all();

    return view('welcome', compact('posts'));
});
*/

Route::get('/', 'PostController@index');

Route::get('/posts/{id}', 'PostController@show');

Route::get('/users', function () {
    return view('users.show');
});