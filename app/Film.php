<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Request;
/**
 * @property integer $id
 * @property integer $genre_id
 * @property integer $release_id
 * @property integer $country_id
 * @property string $film_name
 * @property string $description
 * @property int $price
 * @property int $have_bought
 * @property FilmsCountry $filmsCountry
 * @property FilmsGenre $filmsGenre
 * @property FilmsRelease $filmsRelease
 */
class Film extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['genre_id', 'release_year_id', 'country_id', 'film_name', 'time', 'description', 'price', 'have_bought', 'img_link'];

    public $timestamps = FALSE;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filmsCountry()
    {
        return $this->belongsTo('App\FilmsCountry', 'country_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filmsGenre()
    {
        return $this->belongsTo('App\FilmsGenre', 'genre_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function filmsRelease()
    {
        return $this->belongsTo('App\FilmsRelease', 'release_year_id');
    }

    public static function getHomeFilms($sort, $count)
    {
        $films = DB::table('films')
                    ->join('films_genre', 'films_genre.genre_id', '=', 'films.genre_id')
                    ->join('films_country', 'films_country.country_id', '=', 'films.country_id')
                    ->join('films_release_year', 'films_release_year.release_year_id', '=', 'films.release_year_id')
                    ->orderByDesc($sort)
                    ->take($count)
                    ->get();
        return ['films' => $films];
    }

    public static function getFilmInfo($id)
    {
        $films = DB::table('films')
                    ->join('films_genre', 'films_genre.genre_id', '=', 'films.genre_id')
                    ->join('films_country', 'films_country.country_id', '=', 'films.country_id')
                    ->join('films_release_year', 'films_release_year.release_year_id', '=', 'films.release_year_id')
                    ->select('films.*', 'films_genre.genre', 'films_country.country', 'films_release_year.release') 
                    ->where('films.id', $id)
                    ->first();
        return $films;
    }

    public static function getCustomFilterFilms($custom_filter, $filter_name, $sort, $sort_name, $count)
    {
        $genre = $custom_filter['genre'];
        $country = $custom_filter['country'];
        $release_year = $custom_filter['release_year'];

        $films = DB::table('films')
                    ->join('films_genre', 'films_genre.genre_id', '=', 'films.genre_id')
                    ->join('films_country', 'films_country.country_id', '=', 'films.country_id')
                    ->join('films_release_year', 'films_release_year.release_year_id', '=', 'films.release_year_id')
                    ->when($genre, function ($query) use ($genre) {
                        $arr = [];
                        array_push($arr, ['films_genre.genre', $genre]);
                        $query->where($arr);
                        return $query;
                    })
                    ->when($country, function ($query) use ($country) {
                        $arr = [];
                        array_push($arr, ['films_country.country', $country]);
                        $query->where($arr);
                        return $query;
                    })
                    ->when($release_year, function ($query) use ($release_year) {
                        $arr = [];
                        array_push($arr, ['films_release_year.release_year', $release_year]);
                        $query->where($arr);
                        return $query;
                    })
                    ->when($sort, function($query, $sort) {
                        return $query->orderByDesc($sort); 
                    }, function ($query) {
                        return $query->orderBy('film_name');
                    })
                    ->paginate($count);
        return [
            'films' => $films,
            'filter_name' => $filter_name,
            'sort' => $sort,
            'sort_name' => $sort_name,
        ];
    }

    public static function getFilmSearch($search_value, $sort, $count)
    {
        if ($sort == 'release') {
            $sort_name = 'По дате выхода';
        } elseif ($sort == 'have_bought') {
            $sort_name = 'По популярности';
        } else {
            $sort_name = 'По порядку';
        }

        $films = DB::table('films')
                    ->join('films_genre', 'films_genre.genre_id', '=', 'films.genre_id')
                    ->join('films_country', 'films_country.country_id', '=', 'films.country_id')
                    ->join('films_release_year', 'films_release_year.release_year_id', '=', 'films.release_year_id')
                    ->where('films.film_name', 'like', "%$search_value%")
                    ->when($sort, function($query, $sort) {
                        return $query->orderByDesc($sort); 
                    }, function ($query) {
                        return $query->orderBy('film_name');
                    })
                    ->paginate($count);
        return [
            'films' => $films,
            'search_value' => $search_value,
            'sort' => $sort,
            'sort_name' => $sort_name,
        ];
    }

    public static function editHaveBought($film_id)
    {
        $film = Film::where('id', $film_id)
            ->first();
        $film->have_bought = $film->have_bought + 1;
        $film->save();
    }

}
