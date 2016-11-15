<?php

namespace App\Http\Middleware;
use DB;
use Closure;

class OldMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $m = DB::table('config')->value('status');
        if($m == 1){
            return $next($request);
        }else{
            return view('preserve');
        }
    }
}
