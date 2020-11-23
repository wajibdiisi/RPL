<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Cache;
use Carbon\Carbon;
use App\Models\Profile;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()){
            $expiresAt = Carbon::now()->addMinutes(20); // keep online for 1 min
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            
            Profile::where('user_id',Auth::user()->id)->update(['last_seen' => new \MongoDB\BSON\UTCDateTime()]);
        }
        return $next($request);
    }
}
