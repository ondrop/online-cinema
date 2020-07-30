<?php

namespace App\Http\Controllers;

use Request;
use App\User;
use App\PurchasedFilms;
use App\MovieRent;
use App\Film;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count = 5;
        $user = Auth::user();
        $rent = MovieRent::getUserFilms($user, $count);
        $purchased = PurchasedFilms::getUserFilms($user, $count);
        return view('profile.profile', [
            'rent' => $rent,
            'purchased' => $purchased,
        ]);
    }

    public function change()
    {
        $user = Request::all();
        $user += ['id' => Auth::user()->id];
        User::changeData($user);
        return redirect('profile');
    }

}
