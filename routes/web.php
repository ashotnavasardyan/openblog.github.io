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
Route::get('/cat/{alias}','PostCategoryController@index')->name('category');
Route::post('/cat/{alias}','PostCategoryController@subscribe')->name('subscribe');
Route::get('/u/{id}','ShowUserController@index')->name('user');
Route::group(['prefix'=>'myroom','middleware'=>'auth'],function (){
    Route::get('/','RoomController@index')->name('room');
    Route::resource('posts','RoomPostsController');
    Route::post('/comment/{id}','PostCommentDelete@delete')->name('comment_delete');
    Route::resource('comments','RoomCommentsController');
    Route::get('/settings','RoomSettingsController@index')->name('settingshome');
    Route::post('/changesets/{id}','RoomUpdateSettingsController@index')->name('settings');
    Route::get('/subscribes','RoomSubscribesController@index')->name('subscribes');
    Route::post('/subscribes/{alias}','RoomSubscribesController@unsubscribe')->name('unsubscribe');
    Route::post('/com/show/','RoomCommentShow@show')->name('comment_show');
});
Route::get('/logout',function(){
    Auth::logout();
    return redirect()->route('home');
});
