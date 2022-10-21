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

Auth::routes(['reset' => false, 'confirm' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/{id}', 'PostController@show')->name('post-detail')->where(['id' => '[0-9+]']);

Route::middleware(['auth'])->group(function () {
    Route::get('/create-post', 'PostController@create')->name('create-post');
    Route::post('/create-post', 'PostController@store')->name('create-post-store');
    Route::post('/create-comment', 'PostController@createComment')->name('create-comment');
});
