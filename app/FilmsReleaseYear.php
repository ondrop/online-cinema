<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @property integer $id
 * @property string $release
 * @property string $release_year
 * @property Film[] $films
 */
class FilmsReleaseYear extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'films_release';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['release', 'release_year'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function films()
    {
        return $this->hasMany('App\Film', 'release_year_id');
    }

    public static function getFilterValues()
    {
        $filters_values = FilmsReleaseYear::all();
        return ['release' => $filters_values];
    }
}
