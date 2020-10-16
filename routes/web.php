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

Route::get('/','App\Http\Controllers\PostController@index')->name('post');

Route::get('/like/{id}','App\Http\Controllers\PostController@like');

Route::get('/popular', 'App\Http\Controllers\PostController@popular')->name('popular');

Route::get('/popular/5', 'App\Http\Controllers\PostController@popular5')->name('popular5');

Route::post('like/{id}','App\Http\Controllers\PostController@like')->name('like');

Route::get('likeupdate/{id}','App\Http\Controllers\PostController@likeupdate')->name('likeupdate');