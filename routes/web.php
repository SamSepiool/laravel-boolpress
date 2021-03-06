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


// PUBLIC
Route::get('/', 'PageController@index')->name('guestHome');
Route::get('/blog', 'PostController@index')->name('blogHome');
Route::get('/blog/{slug}', 'PostController@show')->name('singlePost');


// AUTENTICATION
Auth::routes();

// ADMIN AREA

Route::middleware('auth')->namespace('Admin')->name('admin.')->prefix('admin')->group(function
(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
    Route::resource('tags', 'TagController');

});
