<?php

namespace App\Http\Controllers\Film;

use App;
use App\Film;
use App\Http\Controllers\Controller;
use Request;
use App\Http\Middleware;

class FilmController extends Controller
{

    public function __construct()
    {
       $this->middleware('check.filter')->only('showFilmFilter');
       $this->middleware(Middleware\CheckSearchValue::class)->only('showSearchFilms');
    }  

    public function showHomeFilms()
    {
        $sort = 'have_bought';
        $count = 5;
        return view('home', Film::getHomeFilms($sort, $count));   
    }  

    public function showFilmInfo($id)
    {
        $data = Film::getFilmInfo($id);
        
        if ($data) {
            return view('film.film_info', [
                'film' => $data,
                'genre' => App\FilmsGenre::getFilterValues(),
                'country' => App\FilmsCountry::getFilterValues(),
            ]);
        } else {
            return redirect(url()->previous());    
        }
        
    }   

    public function showSearchFilms()
    {
        $search_value = Request::input('search_value');
        $sort = Request::input('sort');
        $count = 12;
        $data = Film::getFilmSearch($search_value, $sort, $count);
        $data += [
            'genre' => App\FilmsGenre::getFilterValues(),
            'country' => App\FilmsCountry::getFilterValues(),
        ];
        return view('film.film_search', $data);
    }

}
