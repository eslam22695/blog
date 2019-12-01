<?php

Route::get('/home', 'Admin\MainController@index')->name('home');
Route::post('/home', 'Admin\MainController@index')->name('home');

Route::group(['middleware' => 'editor'], function(){
    Route::resource('admins', 'Admin\AdminController', ['except' => ['create','show','edit']]);
    Route::resource('users', 'Admin\UserController', ['except' => ['create','show','edit']]);    
});

Route::resource('tag', 'Admin\TagController', ['except' => ['create','show','edit']]);
Route::resource('blog' , 'Admin\BlogController');