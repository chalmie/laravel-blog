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
// Authentication
Auth::routes();

// Main Public Pages
Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');
Route::get('contact', ['uses' => 'PagesController@getContact', 'as' => 'home']);

// Public posts
Route::get('blog', ['uses' => 'BlogController@getArchive', 'as' => 'blog.index']);
Route::get('blog/{slug}', ['uses' => 'BlogController@getSingle', 'as' => 'blog.single'])->where('slug', '[\w\d\-\_]+');

// Comments
Route::post('comments/{id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::update('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);

// Admin Posts
Route::resource('posts', 'PostController');

// Admin Categories
Route::resource('categories', 'CategoryController', ['except' => 'create']);

// Admin Tags
Route::resource('tags', 'TagController');
