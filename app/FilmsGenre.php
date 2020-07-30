<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $genre
 * @property Film[] $films
 */
class FilmsGenre extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'films_genre';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['genre'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films()
    {
        return $this->hasMany('App\Film', 'genre_id');
    }

    public static function getFilterValues()
    {
        return FilmsGenre::all()->toArray();
    }
}
