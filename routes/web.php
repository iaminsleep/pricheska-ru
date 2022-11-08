<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'admin' // запрос пройдёт через этот посредник
], function () {
    Route::get('/', 'MainController@index')->name('admin.index');

    Route::resource('/categories', 'CategoryController');

    Route::resource('/tags', 'TagController');

    Route::resource('/posts', 'PostController');
});

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Доступно и гостям, и авторизованным пользователям
    Route::get('/', 'PostController@index')->name('home');

    Route::get('/article/{slug}', 'PostController@show')->name('posts.single');
    Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');
    Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');

    Route::get('/search', 'SearchController@index')->name('search');

    // Доступно только гостям
    Route::group(['middleware' => 'guest'], function () {
        Route::group(['prefix' => 'register'], function () {
            Route::get('/', 'UserController@create')->name('register.create');
            Route::post('/', 'UserController@store')->name('register.store');
        });


        Route::group(['prefix' => 'login'], function () {
            Route::get('/', 'UserController@loginForm')->name('login.create');
            Route::post('/', 'UserController@login')->name('login');
        });
    });

    // Доступно только авторизованным пользователям
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', 'UserController@logout')->name('logout');
    });
});
