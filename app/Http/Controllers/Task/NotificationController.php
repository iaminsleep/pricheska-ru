<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function read()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return back();

    }
}
