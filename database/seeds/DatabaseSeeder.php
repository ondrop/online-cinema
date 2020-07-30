<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call('FilmsCountryTableSeeder');
        $this->call('FilmsReleaseYearTableSeeder');
        $this->call('FilmGenreTableSeeder');
        $this->call('FilmTableSeeder');
    }
}

class FilmTableSeeder extends Seeder {

    public function run()
    {
        for ($i = 1; $i <= 20 ; $i++) { 
            DB::table('films')->insert([
                'genre_id' => mt_rand(1, 10),
                'film_name' => 'Фильм №' . mt_rand(1, 1000), 
                'release_year_id' => mt_rand(1, 20), 
                'country_id' => mt_rand(1, 20), 
                'time' => '1:59:50',
                'description' => 'Это если что описание', 
                'price' => mt_rand(1, 20) . 0,
                'img_link' => '/storage/films_image/1/1_1.jpg',
            ]);     
        }
    }

}

class FilmGenreTableSeeder extends Seeder {

    public function run()
    {
        for ($i = 1; $i <= 20 ; $i++) { 
            DB::table('films_genre')
                ->insert(['genre' => 'Жанр ' . $i]);     
        }
    }

}

class FilmsCountryTableSeeder extends Seeder {

    public function run()
    {
        for ($i = 1; $i <= 20 ; $i++) { 
            DB::table('films_country')
            ->insert(['country' => 'Страна №' . $i]);       
        }
        
    }

}

class FilmsReleaseYearTableSeeder extends Seeder {

    public function run()
    {
        for ($i = 1; $i <= 20 ; $i++) { 
            $year = mt_rand(1910, Carbon\Carbon::now()->year);
            DB::table('films_release_year')->insert([ 
                'release' => $year . '-' . mt_rand(1, 12) . '-' . mt_rand(1, 28), 
                'release_year' => $year,
            ]);     
        }
    }

}
