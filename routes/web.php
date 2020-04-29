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
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@postLogin')->name('post.login');
Route::post('/logout', 'AuthController@logout')->name('logout');


Route::middleware('auth')->group(function(){
    Route::get('/', 'HomeController@getHome')->name('get.videos');
    Route::get('/video/record', 'HomeController@getRecord')->name('get.add.video');
    Route::post('/upload/video', 'HomeController@addVideo')->name('upload.video');
    Route::get('/delete/video/{id}', 'HomeController@delete')->name('delete.video');
    Route::get('/logout', 'AuthController@logout')->name('logout');

});

