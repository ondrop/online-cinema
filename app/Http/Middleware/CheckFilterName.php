<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Schema;

class CheckFilterName
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
        $filter_name = $request->route('filter_name');
        if ((Schema::hasTable('films_' . $filter_name))) {
           
            if (($request->is('films/filter/genre'))) {
                $filter_name = 'Жанр';
            } elseif (($request->is('films/filter/release_year'))) {
                $filter_name = 'Год';
            } elseif (($request->is('films/filter/country'))) {
                $filter_name = 'Страна';
            }

            $request->attributes->add(['filter_name' => $filter_name]);
            $response = $next($request);
        } else {
            $response = redirect('films');
        }
        return $response;
    }
}
