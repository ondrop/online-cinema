<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $country
 * @property Film[] $films
 */
class FilmsCountry extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'films_country';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['country'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films()
    {
        return $this->hasMany('App\Film', 'country_id');
    }

    public static function getFilterValues()
    {
        return FilmsCountry::all()->toArray();
    }

}
