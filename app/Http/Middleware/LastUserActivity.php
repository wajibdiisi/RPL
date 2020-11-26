<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use Cache;
use Carbon\Carbon;
use App\Helpers\UserHelp;
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
            $expiresAt = Carbon::now()->addMinutes(5); 
            Cache::put('user-is-online-' . UserHelp::getID(Auth::user()->id), true, $expiresAt);
            
            Profile::where('user_id',Auth::user()->id)->update(['last_seen' => new \MongoDB\BSON\UTCDateTime()]);
        }
        return $next($request);
    }
}
