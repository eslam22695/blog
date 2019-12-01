<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
class Admin
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
        /* if(auth()->user()->type == 0){
            return $next($request);
        }
        return redirect('/admin/home')->with('error','You don\'t have admin access'); */
        if (auth()->user()->type == 1)
        {
            return new Response(view('admin.unauthorized'));
        }
        return $next($request);
    }
}
