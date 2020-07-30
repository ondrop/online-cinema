<?php

namespace App\Http\Controllers\Film;

use App\PurchasedFilms;
use App\Film;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Auth;

class PurchasedFilmsСontroller extends Controller
{

    public function index()
    {
        $film_id = Request::input('film_id');
        $data = array_merge(Request::all(), ['user_id' => Auth::user()->id]);
        PurchasedFilms::store($data);
        Film::editHaveBought($film_id);
        return redirect(url()->previous());
    }

}
