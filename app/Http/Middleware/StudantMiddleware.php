<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class StudantMiddleware
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
      if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'studant')
          return $next($request);
      else
        return redirect('/');
    }
}
