<?php
Auth::routes();
Route::get('/',function(){
   return redirect()->route('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about','AboutController@index')->name('about');
Route::get('/post/{alias}','HomeController@show')->name('blogshow');
Route::post('/post/{alias}','CommentController@send')->name('commentsend');
Route::get('/contact','ContactController@index')->name('contact');
Route::post('/contact','ContactController@send')->name('contactsend');

Route::group(['prefix'=>'myroom','middleware'=>'auth'],function (){
    Route::get('/','RoomController@index')->name('room');
    Route::resource('posts','RoomPostsController');
    Route::post('/comment/{id}','PostCommentDelete@delete')->name('comment_delete');
    Route::post('/comments','ShowCommentController@change')->name('comment_show');
});