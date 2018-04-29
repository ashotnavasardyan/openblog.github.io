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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{alias}','HomeController@show')->name('blogshow');
Route::post('/{alias}','CommentController@send')->name('commentsend');
Route::get('/login','ControllerLogin@login')->name('login');

Auth::routes();

