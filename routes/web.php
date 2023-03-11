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

        Route::get('/hairdressers', 'UserController@hairdressers')->name('admin.hairdressers.index');

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

        Route::get('/tasks/{id}', 'TaskController@show')->name('tasks.single');
        Route::get('/tasks/{id}/edit', 'TaskController@edit')->name('task.edit');
        Route::put('/tasks/{id}/update', 'TaskController@update')->name('task.update');
        Route::delete('/tasks/{id}/delete', 'TaskController@destroy')->name('task.delete');
        Route::put('tasks/{taskId}/refuse', 'TaskController@refuse')->name('task.refuse');
        Route::put('tasks/{taskId}/complete', 'TaskController@complete')->name('task.complete');

        Route::get('/search-task', 'TaskController@search')->name('task.search');

        Route::group(['prefix' => 'responses'], function () {
            Route::post('{taskId}/post', 'ResponseController@store')->name('response.store');
            Route::delete('/delete/{responseId}', 'ResponseController@delete')->name('response.delete');
            Route::put('/accept/{responseId}', 'ResponseController@accept')->name('response.accept');
        });

        Route::get('/create', 'TaskController@create')->name('task.create');
        Route::post('/create', 'TaskController@store')->name('task.store');

        Route::get('/users', 'UserController@index')->name('users.index');
        Route::get('/users/{id}', 'UserController@show')->name('users.single');
        Route::get('/search-user', 'UserController@search')->name('users.search');

        Route::group(['prefix' => 'user'], function () {
            Route::post('/{id}/add-fav', 'UserController@add_fav')->name('favourites.add');
            Route::delete('/{id}/del-fav', 'UserController@delete_fav')->name('favourites.delete');
        });

        Route::get('/mylist', 'TaskController@personal')->name('mylist.index');

        Route::get('/account', 'UserController@account')->name('account.index');
        Route::put('/account', 'UserController@store')->name('account.store');
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
