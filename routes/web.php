<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', 'Film\FilmController@showHomeFilms')->name('home');

Route::get('/', 'Film\FilmController@showHomeFilms');

Route::get('/search', 'Film\FilmController@showSearchFilms')->name('search');

Route::get('/films', 'Film\FilterController@index')->name('films_home');

Route::get('/films/{id}', 'Film\FilmController@showFilmInfo')->name('film_page');

Route::get('/tv_series', 'Film\FilterController@index')->name('tv_series_home');

Auth::routes(['verify' => true]);

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/profile/change', 'ProfileController@change')->name('change_profile');

Route::get('/thanks_page_buy', 'Film\PurchasedFilmsСontroller@index')->name('thanks_page_buy');

Route::get('/thanks_page_rent', 'Film\MovieRentController@index')->name('thanks_page_rent');
