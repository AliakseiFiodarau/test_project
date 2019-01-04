<?php

namespace App\Http\Middleware;

use App\Bicycle;
use Closure;

class IsAvailable
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
        $item = Bicycle::find($request->id);
        if ($item->available){
            return $next($request);
        }
        return redirect('not_available');
    }
}
