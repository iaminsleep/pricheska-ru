<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    // Доступно только админам
    Route::group([
        'prefix' => 'admin',
        'namespace' => 'Admin',
        'middleware' => 'role:admin' // запрос пройдёт через этот посредник
    ], function () {
        Route::get('/', 'MainController@index')->name('admin.index');

        Route::resource('/users', 'UserController');

        Route::resource('/roles', 'RoleController');

        Route::resource('/tags', 'TagController');

        Route::group(['namespace' => 'Blog'], function () {
            Route::resource('/blog-categories', 'CategoryController');

            Route::resource('/posts', 'PostController', [
                'names' => [
                    'index' => 'admin.posts.index', 'create' => 'admin.posts.create',
                    'store' => 'admin.posts.store', 'edit' => 'admin.posts.edit',
                    'update' => 'admin.posts.update', 'destroy' => 'admin.posts.destroy',
                ]
            ]);
        });

        Route::group(['namespace' => 'Task'], function () {
            Route::resource('/categories', 'CategoryController');

            Route::resource('/responses', 'ResponseController');

            Route::resource('/feedbacks', 'FeedbackController');

            Route::resource('/tasks', 'TaskController', [
                'names' => [
                    'index' => 'admin.tasks.index', 'create' => 'admin.tasks.create',
                    'store' => 'admin.tasks.store', 'edit' => 'admin.tasks.edit',
                    'update' => 'admin.tasks.update', 'destroy' => 'admin.tasks.destroy',
                ]
            ]);
        });
    });

    Route::get('/user/{id}', 'UserController@show')->name('users.single');

    // Доступно и гостям, и авторизованным пользователям
    Route::group(['namespace' => 'Task'], function () {
        Route::get('/', 'TaskController@index')->name('home');

        Route::get('/tasks', 'TaskController@index')->name('tasks.index');

        Route::get('/task/{id}', 'TaskController@show')->name('tasks.single');
    });

    Route::group(['prefix' => 'blog', 'namespace' => 'Blog'], function () {
        Route::get('/', 'PostController@index')->name('posts.index');

        Route::get('/article/{slug}', 'PostController@show')->name('posts.single');
        Route::get('/category/{slug}', 'CategoryController@show')->name('categories.single');
        Route::get('/tag/{slug}', 'TagController@show')->name('tags.single');

        Route::get('/search', 'SearchController@index')->name('search');
    });

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
