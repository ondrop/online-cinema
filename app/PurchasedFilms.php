<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

/**
 * @property string $film_name
 * @property string $user_nickname
 * @property User $user
 */
class PurchasedFilms extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['film_id', 'user_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public static function store($data)
    {
        PurchasedFilms::firstOrCreate($data);
    }

    public static function check($film, $user_info)
    {
        $film_id = $film->id;

        if ($user_info) {
            $user_info = $user_info->id;
        }
        
        return PurchasedFilms::where('user_id', $user_info)
                              ->where('film_id', $film_id)
                              ->first();
    }

    public static function getUserFilms($user, $count)
    {
        return DB::table('purchased_films')
                 ->join('films', 'films.id', '=', 'purchased_films.film_id')
                 ->join('films_genre', 'films_genre.genre_id', '=', 'films.genre_id')
                 ->join('films_country', 'films_country.country_id', '=', 'films.country_id')
                 ->join('films_release_year', 'films_release_year.release_year_id', '=', 'films.release_year_id')
                 ->select('films.*', 'films_genre.genre', 'films_country.country', 'films_release_year.release', 'films_release_year.release_year') 
                 ->where('user_id', $user->id)
                 ->when($count, function($query, $count) {
                    $agent = new Agent();
                    if (($agent->isMobile()) || ($agent->isTablet())) {
                        return $query->simplePaginate($count);
                    } else {
                        return $query->paginate($count);
                    }
                });
    }

}
