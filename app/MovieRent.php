<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades;
use Request;
use Carbon\Carbon;


/**
 * @property string $user_nickname
 * @property string $film_name
 * @property string $created_at
 * @property string $updated_at
 * @property string $delete_after
 * @property User $user
 */
class MovieRent extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'movie_rent';

    /**
     * @var array
     */
    protected $fillable = ['user_id', 'film_id', 'created_at', 'updated_at', 'delete_after'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function store($data)
    {
        MovieRent::firstOrCreate($data);
    }

    public static function check($film, $user_info)
    {
        $film_id = $film->id;

        if ($user_info) {
            $user_info = $user_info->id;
        }

        return MovieRent::where('user_id', $user_info)
                        ->where('film_id', $film_id)
                        ->first();
    }

    public static function getUserFilms($user, $count)
    {
        return DB::table('movie_rent')
                 ->join('films', 'films.id', '=', 'movie_rent.film_id')
                 ->join('films_genre', 'films_genre.genre_id', '=', 'films.genre_id')
                 ->join('films_country', 'films_country.country_id', '=', 'films.country_id')
                 ->join('films_release_year', 'films_release_year.release_year_id', '=', 'films.release_year_id')
                 ->select('films.*', 'films_genre.genre', 'films_country.country', 'films_release_year.release', 'films_release_year.release_year')
                 ->where('user_id', $user->id)
                 ->paginate($count);
    }

}
