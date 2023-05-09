<?php

namespace App\Http\Services;

use Illuminate\Pipeline\Pipeline;

use App\Models\User;

class SearchUserService
{
    public function execute()
    {
        $query = User::query();

        return app(Pipeline::class)
            ->send($query)
            ->through([
                \App\Filters\Users\ByUserCategories::class,
                \App\Filters\Users\ByUserOnline::class,
                \App\Filters\Users\ByUserIsFree::class,
                \App\Filters\Users\ByUserHasFeedbacks::class,
                \App\Filters\Users\ByUserFavourites::class,
                \App\Filters\Users\ByUserCategory::class,
                \App\Filters\Users\ByUserName::class,
                \App\Filters\Users\ByUserRating::class,
                \App\Filters\Users\ByUserTasksCount::class,
                \App\Filters\Users\ByUserPopularity::class,
            ])
            ->thenReturn();
    }
}
