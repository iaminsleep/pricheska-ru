<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Cache;
use Carbon\Carbon;

use App\Models\User;

class LastUserActivity
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(1);

            Cache::put('user-is-online-'.Auth::user()->id, true, $expiresAt);

            User::where('id', Auth::user()->id)->update(['last_seen' => (new \DateTime())->format("Y-m-d H:i:s")]);
        }

        return $next($request);
    }
}
