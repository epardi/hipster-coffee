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

Route::view('/', 'home');
Route::view('/about', 'about.about');
Route::view('/menu', 'menu.menu');
Route::view('/contact', 'contact.contact');

Auth::routes();

Route::get('register', 'Auth\RegisterController@index')->name('registration-index');
Route::post('register/store', 'Auth\RegisterController@store')->name('registration-store');
Route::patch('register/update', 'Auth\RegisterController@update')->name('update-avatar');

Route::patch('posts/{post}/update-likes', 'PostsController@updateLikes')->name('update-likes');

Route::resource('posts', 'PostsController');

Route::post('posts/{post}/sort-comments', 'CommentsController@sort')->name('sort-comments');
Route::post('posts/{comment}', 'CommentsController@store')->name('comments.store');
Route::post('posts/{comment}/{reply}', 'CommentsController@storeReply')->name('replies.store');
Route::get('posts/{post}/{comment}/edit', 'CommentsController@edit')->name('comments.edit');
Route::patch('posts/{post}/{comment}', 'CommentsController@update')->name('comments.update');
Route::delete('posts/{post}/delete-comment', 'CommentsController@destroy')->name('comments.destroy');
Route::delete('posts/{post}/{user}', 'UsersController@destroy')->name('user-comments.destroy');

Route::get('/tags', 'TagsController@index')->name('tags.index');
Route::post('/tags', 'TagsController@update')->name('tags.update');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::get('/posts/tags/{tag}', 'PostsController@index')->name('posts.tag');
