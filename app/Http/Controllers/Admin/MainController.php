<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Charts\SampleChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class MainController extends Controller
{
    public function index()
    {
        $users_count = DB::table('users')->count();
        $tasks_count = DB::table('tasks')->count();
        $posts_count = DB::table('posts')->count();
        $comments_count = DB::table('comments')->count();

        return view(
            'admin.index',
            [
                'users_count' => $users_count,
                'tasks_count' => $tasks_count,
                'posts_count' => $posts_count,
                'comments_count' => $comments_count
            ]
        );
    }
}
