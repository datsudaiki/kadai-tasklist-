<?php

// デフォルトのコメント部分は省略
 Route::get('/login', 'TasksController@index');
// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::resource('tasks', 'TasksController');
// ユーザ機能
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'TasksController@index');


    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);

    Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
    Route::group(['prefix' => 'users/{id}'], function () {
        
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
    });

    
});