<?php
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','AboutController@index')->name('about');
Route::get('/{alias}','HomeController@show')->name('blogshow');
Route::post('/{alias}','CommentController@send')->name('commentsend');
