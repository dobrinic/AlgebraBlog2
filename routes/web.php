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

Route::get('/posts/{id}', 'PostController@show')->name('posts.show');


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





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
