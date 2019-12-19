<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class isLogin
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
        
       if(!isset($_SESSION['auth'])){
        return redirect('/login');
       }

       return $next($request);
    }
}
