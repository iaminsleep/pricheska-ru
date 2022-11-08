<?php

namespace App\Providers;

use App\Models\Blog\Post;
use App\Models\Blog\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // использование view composer для вывода данных, в этом случае не нужно передавать данные из контроллера в blade, функция boot делает всё заранее
        view()->composer('front.blog.posts.layouts.sidebar', function ($view) {
            // проверка, есть ли в кэше популярные категории, если их нет то он обновляет данные каждые 60 секунд, т.к по истечению времени данные удаляются из кэша
            if (Cache::has('popular_categories')) {
                $popular_categories = Cache::get('popular_categories');
            } else {
                $popular_categories = Category::withCount('posts')->orderBy('posts_count', 'desc')->limit(8)->get();
                Cache::put('popular_categories', $popular_categories, 60); // 60 seconds until cache expiration
            }

            // популярные посты в боковом меню
            $view->with('popular_posts', Post::orderBy('views', 'desc')->limit(3)->get()); // альтернативa limit - take

            // популярные категории в боковом меню
            $view->with('popular_categories', $popular_categories);
        });
    }
}
