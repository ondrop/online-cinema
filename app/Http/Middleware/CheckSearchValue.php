<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class CheckSearchValue
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
        $search_value = Request::input();

        if (array_key_exists('search_value', $search_value)) {
            $search_value = $search_value['search_value'];
        }

        if ($search_value) {
            $responce = $next($request);
        } else {
            $responce = redirect(url()->previous());
        }

        return $responce;
    }
}
