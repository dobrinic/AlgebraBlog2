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
    return view('welcome');
});

/***************** POSTS *******************/
Route::get('/posts', 'PostController@index')->name('posts.index');

Route::get('/posts/create', 'PostController@create')->name('posts.create');

Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

Route::post('/posts', 'PostController@store')->name('posts.store');

Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

Route::patch('/posts/{post}','PostController@update')->name('posts.update');

Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');


/***************** USERS *******************/
// prikaži sve usere
Route::get('/users', 'UserController@index')->name('users.index');

// prikaži formu za kreiranje usera
Route::get('/users/create', 'UserController@create')->name('users.create');

// spremi usera u bazu
Route::post('/users', 'UserController@store')->name('users.store');

// prikaži pojedinog usera
Route::get('/users/{user}', 'UserController@show')->name('users.show');

// prikaži formu za uređivanje usera
Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');

// obriši usera
Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');

// ažuriraj korisnika
Route::patch('/users/{user}','UserController@update')->name('users.update');

/***************** COMMENTS *******************/
Route::post('/posts/{post}/comments', 'CommentController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
