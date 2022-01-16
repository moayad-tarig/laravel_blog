<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\profileController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', 'App\Http\Controllers\profileController@index')->name('profile');
Route::put('/profile/update', 'App\Http\Controllers\profileController@update')->name('profile.update');

//Post Rote
Route::get('/posts', 'App\Http\Controllers\PostController@index')->name('posts');
Route::get('/posts/trashed', 'App\Http\Controllers\PostController@postsTrashed')->name('posts.trashed');
Route::get('/post/create', 'App\Http\Controllers\PostController@create')->name('post.create')->middleware('auth');
Route::post('/post/store', 'App\Http\Controllers\PostController@store')->name('post.store');
Route::get('/post/show/{slug}', 'App\Http\Controllers\PostController@show')->name('post.show');
Route::get('/post/edit/{id}', 'App\Http\Controllers\PostController@edit')->name('post.edit');
Route::post('/post/update/{id}', 'App\Http\Controllers\PostController@update')->name('post.update');
Route::get('/post/destroy/{id}', 'App\Http\Controllers\PostController@destroy')->name('post.destroy');
Route::get('/post/hdelete/{id}', 'App\Http\Controllers\PostController@hdelete')->name('post.hdelete');
Route::get('/post/restore/{id}', 'App\Http\Controllers\PostController@restore')->name('post.restore');




//Tags Route
Route::get('/tags', 'App\Http\Controllers\TagController@index')->name('tags');
Route::get('/tag/create', 'App\Http\Controllers\TagController@create')->name('tag.create')->middleware('auth');
Route::post('/tag/store', 'App\Http\Controllers\TagController@store')->name('tag.store');
Route::get('/tag/edit/{id}', 'App\Http\Controllers\TagController@edit')->name('tag.edit');
Route::post('/tag/update/{id}', 'App\Http\Controllers\TagController@update')->name('tag.update');
Route::get('/tag/destroy/{id}', 'App\Http\Controllers\TagController@destroy')->name('tag.destroy');


//Users
Route::get('/users', 'App\Http\Controllers\Usercontroller@index')->name('users');
Route::get('/user/create', 'App\Http\Controllers\Usercontroller@create')->name('user.create')->middleware('auth');
Route::post('/user/store', 'App\Http\Controllers\Usercontroller@store')->name('user.store');
Route::get('/user/edit/{id}', 'App\Http\Controllers\Usercontroller@edit')->name('user.edit');
Route::post('/user/update/{id}', 'App\Http\Controllers\Usercontroller@update')->name('user.update');
Route::get('/user/destroy/{id}', 'App\Http\Controllers\Usercontroller@destroy')->name('user.destroy');