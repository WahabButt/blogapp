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

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create')->middleware('simple');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');


Route::get('/login', 'SessionsController@create')->name('login')->middleware('validator');
Route::post('/login', 'SessionsController@login');
Route::get('/logout', 'SessionsController@destroy');

Route::post('/register', 'AdminController@createUser');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/delete/{id}', 'AdminController@deleteUser');
    Route::get('/dashboard', 'AdminController@index');
    Route::get('/blogstatus', 'AdminController@viewBlogStatus');
    Route::get('/updatestatus/{id}/{status}', 'AdminController@updateBlogStatus');
});

//Route::get('/delete/{id}', 'AdminController@deleteUser')->middleware('admin');
//Route::get('/dashboard', 'AdminController@index')->middleware('admin');
//Route::get('/blogstatus', 'AdminController@viewBlogStatus')->middleware('admin');
//Route::get('/updatestatus/{id}/{status}', 'AdminController@updateBlogStatus')->middleware('admin');

