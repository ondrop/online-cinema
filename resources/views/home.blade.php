@extends('layouts.app')

@section('content')
<div class="home home_overflow_hidden">
  <button class="slider-control slider-control-left fas fa-arrow-left"></button>
  <div class="slider home__slider slider_display_flex">
    @foreach ($films as $film) 
    <div class="slider__item" style="background: linear-gradient(rgb(3, 2, 16, .6), rgb(3, 2, 16, .6)), no-repeat 50% 50% url('/storage/films_image/{{ $film->id }}/{{ $film->id }}_3.jpg'); background-size: cover; transform: translateX(-200%);">
      <div class="film-description film-info-block film-info film-details-info__block film-info-block_display_table-cell film-info-block_size_m film-info-block_size_l">
        <a href="{{ route('film_page', ['id' => $film->id]) }}" class="slider-film-name film-name film-info-block__item film-info-block__item_display_block">
          {{ $film->film_name }}
        </a>
        <span class="film-info__category film-info-block__item film-info-block__item_display_block">
          Genre: {{ $film->genre }}
        </span>
        <span class=" film-info__category film-info-block__item film-info-block__item_display_block">
          Country: {{ $film->country }}
        </span>
        <span class="play-trailer-case film-info__category film-info-block__item film-info-block__item_display_flex">
          <a href="{{ route('film_page', ['id' => $film->id]) }}" class="play-trailer"></a>
          <a href="{{ route('film_page', ['id' => $film->id]) }}" class="play-trailer-link">Play trailer</a>
        </span>
      </div>
    </div>
    @endforeach
  </div>
  <button class="slider-control slider-control-right fas fa-arrow-right"></button>
  <div class="shows-block home__shows home__shows_size">
    <div class="shows-block-header shows-block__item">
      <div class="header-text-case shows-block-header__item shows-block-header__item_size_m">
        <span class="header-text-case__item shows-block-header-text shows-block-header-text_display_block">POPULAR SHOWS</span>
      </div>
    </div>
    <div class="home-films-block shows-block__item home-films-block_display_grid">
      <?php foreach ($films as $film) : ?>
        <div class="film-case film-case_size">
          <div class="film-case-info film-case__info film-case-info_size_m film-case-info_overflow_hidden film-case-info_transition">
            <div class="film-image-case_gradient">
              <img class="film-image film-case__image film-image_size" src="{{ $film->img_link }}">
              <a href="{{ route('film_page', ['id' => $film->id]) }}" class="play-film-link play-film-link_transition"></a>
            </div>
            <div class="film-info film-case-info__info film-case-info__info_transition">
              <div class="film-info-block film-info-block_display_table-cell film-info-block_size_s">
                <a href="{{ route('film_page', ['id' => $film->id]) }}" class="film-info__item film-info__item_display_block">
                  {{ $film->film_name }}
                </a>
                <span class="film-category film-info__category film-info__item film-info__item_display_block">
                  {{ $film->genre . ', ' . $film->country . ', ' . $film->release_year }}
                </span>
                <span class="film-time film-info__item film-info__item_display_block">
                  <i class="far fa-clock"></i>
                  {{ $film->time }}
                </span>
              </div>
            </div>                     
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <a class="shows-block-link shows-block__link shows-block__link_display_block shows-block__link_size shows-block-link_transition" href="{{ route('films_home', ['sort' => 'have_bought']) }}">
      View All
      <i class="fas fa-angle-right"></i>
    </a>
  </div>
</div>
@endsection
