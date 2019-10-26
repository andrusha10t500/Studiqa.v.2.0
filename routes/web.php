<?php

Route::group(['middleware' => ['web']], function() {

    Route::get('/', function () {
        return view('main');
    })->name('home');

    Route::get('/logout', [
       'uses' => 'UserController@logout',
       'as' => 'logout'
    ]);

    Route::post('/signup', [
        'uses' => 'UserController@signup',
        'as' => 'signup'
    ]);

    Route::post('/signin', [
       'uses' => 'UserController@signin',
       'as' => 'signin'
    ]);

    Route::get('/getUserFile/{filename}' , [
       'uses' => 'UserController@getUserFile',
       'as' => 'getUserFile'
    ]);

    Route::post('/deleteUser', [
       'uses' => 'AdminController@deleteUser',
       'as' => 'deleteUser'

    ]);

});

