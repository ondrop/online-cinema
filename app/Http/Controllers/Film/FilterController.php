<?php

namespace App\Http\Controllers\Film;

use App;
use App\Film;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Middleware;

class FilterController extends Controller
{

    public function __construct()
    {
       $this->middleware(Middleware\CheckFilterExist::class);
    }

    public function index()
    {
        $custom_filter = \Request::get('input');
        $filter_name = \Request::get('header_name');
        $sort = \Request::get('sort');
        $sort_name = \Request::get('sort_name');
        $count = 12;
        $data = App\Film::getCustomFilterFilms($custom_filter, $filter_name, $sort, $sort_name, $count);
        $data += [
            'genre' => App\FilmsGenre::getFilterValues(),
            'country' => App\FilmsCountry::getFilterValues(),
        ];
        return view('film.films_filter_home', $data);
    }

}
