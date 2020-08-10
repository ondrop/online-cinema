<?php

namespace App\Http\Middleware;

use Closure;
use Request;

class CheckFilterExist
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
        $input = Request::all();
        $header_name = null;
        $sort = Request::input('sort');

        if ($sort == 'release') {
            $sort_name = 'По дате выхода';
        } elseif ($sort == 'have_bought') {
            $sort_name = 'По популярности';
        } else {
            $sort_name = 'По порядку';
        }

        if ((array_key_exists('genre', $input)) && ($input['genre'] != 'Genre')) {
            $header_name = $header_name . $input['genre'] . ', ';
        } else {
            $input['genre'] = null;
        }

        if ((array_key_exists('country', $input)) && ($input['country'] != 'Country')) {
            $header_name = $header_name . $input['country'] . ', ';   
        } else {
            $input['country'] = null;
        }

        if ((array_key_exists('release_year', $input)) && ($input['release_year'] != 'Year')) {
            $header_name = $header_name . $input['release_year'] . ', ';
        } else {
            $input['release_year'] = null;
        }

        if ($header_name) {
            $header_name = mb_substr($header_name, 0, -2);
        } else {
            $header_name = 'All films';
        }

        $request->attributes->add([
            'header_name' => $header_name,
            'input' => $input,
            'sort' => $sort,
            'sort_name' => $sort_name,
        ]);
        $response = $next($request);
        return $response;
    }
}
