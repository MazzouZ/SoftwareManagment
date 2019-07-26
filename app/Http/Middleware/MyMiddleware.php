<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Carbon\Carbon;

class MyMiddleware
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
        // call your function
        //$this->Add_Conge_days();

        return $next($request);
    }


}
