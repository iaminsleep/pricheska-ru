<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

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
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', 'UserController@create')->name('register.create');

        Route::post('/register', 'UserController@store')->name('register.store');

        Route::get('/login', 'UserController@loginForm')->name('login.create');

        Route::post('/login', 'UserController@login')->name('login');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', 'UserController@logout')->name('logout');
    });
});
