<?php

namespace App\Http\Controllers\Film;

use App\MovieRent;
use App\Film;
use App\Http\Controllers\Controller;
use Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MovieRentController extends Controller
{

    public function index()
    {
        $film_id = Request::input('film_id');
        $data = array_merge(Request::all(), ['user_id' => Auth::user()->id]);
        $data += ['delete_after' => Carbon::now()->addDays(30)];
        MovieRent::store($data);
        Film::editHaveBought($film_id);
        return redirect(url()->previous());
    }
    
}
