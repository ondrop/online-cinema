@extends('layouts.app')

@section('content')
<div class="category-home category-home_overflow_hidden">
  <div class="film-info-background category-home__item films-page-background_size films-page-background_size_s" style="content: url('/storage/films_image/{{ $film->id }}/{{ $film->id }}_3.jpg')"></div>
  <div class="background-sign background-sign-shadow background-sign_size_s background-sign_size_m background-sign_size_l">movie details</div>
  <div class="background-sign background-sign_size_s">movie details</div>
  <div class="head-block film-page__head-block category-home__head-block category-home__item category-home__head-block_size category-home__head-block_display_flex">
    @include('includes.side_bar')
    <div class="film-details-block head-block__film-details-block head-block__films-block_size_m head-block__films-block_size_s">
      <div class="film-details film-details-block__item film-details_size">
        <div class="film-image-case film-image-case_overflow_hidden film-image-case_gradient film-image-case_size film-image-case_transition">
          <img src="/storage/films_image/{{ $film->id }}/{{ $film->id }}_2.jpg" class="film-image-case__img film-image-case__item film-image-case__item_size film-image-case__img_transition">
          @if (($film->price == 0) || (App\MovieRent::check($film, Auth::user())) || (App\PurchasedFilms::check($film, Auth::user())))
            <a id="watch-film" href="#watch" class="play-film-link film-image-case__play-film-link play-film-link_transition film-image-case__item"></a>
          @else
            <a id="buy-film" href="#buy" class="play-film-link film-image-case__play-film-link play-film-link_transition film-image-case__item"></a>
          @endif
        </div>
        <div class="film-details-info film-details__info film-details_item">
          <div class="film-description film-info-block film-info film-details-info__block film-info-block_display_table-cell film-info-block_size_m">
            <span class="film-description__item film-name film-description__film-name film-info-block__item film-info-block__item_display_block">
              {{ $film->film_name }}
            </span>
            <span class="film-description__item film-info__category film-info-block__item film-info-block__item_display_block">
              Genre: {{ $film->genre }}
            </span>
            <span class="film-description__item film-info__category film-info-block__item film-info-block__item_display_block">
              Country: {{ $film->country }}
            </span>
            <span class="film-description__item film-info__category film-info-block__item film-info-block__item_display_block">
              Release: {{ $film->release }}
            </span>
            <span class="film-description__item film-time film-info-block__item film-info-block__item_display_block">
              Time: {{ $film->time }}
            </span>
            <div class="share-case film-description__share-case film-info-block__item">
              Share: 
              <a href="" class="share-logo share-case__item share-logo_transition fab fa-facebook-square"></a>
              <a href="" class="share-logo share-case__item share-logo_transition fab fa-twitter"></a>
              <a href="" class="share-logo share-case__item share-logo_transition fab fa-instagram"></a>
              <a href="" class="share-logo share-case__item share-logo_transition fab fa-pinterest"></a>
              <a href="" class="share-logo share-case__item share-logo_transition fab fa-vimeo-v"></a>
            </div>
          </div>
        </div>
      </div>
      <div class="movie-story film-details-block__item">
        <div class="movie-story__header">Movie Story</div>
        <div class="movie-story__text">
          {{ $film->description }}
        </div>
      </div>
    </div>
  </div>  
</div>

<div id="buy" class="modal-case modal-case_position modal-case_size" role="dialog">
  <div class="modal modal-case__item modal-case__item_size">
    <div class="modal-header modal__header modal__item">
      <div class="modal-title modal-header__item">{{ $film->film_name }}</div>
    </div>
    <div class="modal-body modal__item modal-body_display_flex">
      <div class="modal-body-buy modal-body__item modal-body__item_size_s">
        <div class="modal-body-buy-title modal-body-buy__item">Purchase</div>
        <div class="modal-body-buy-text modal-body-buy__text modal-body-buy__item">
          The film is avaliable forever, number of views is not limited
        </div>
        @if (Auth::check())
          <a href="{{ route('thanks_page_buy', ['film_id' => $film->id]) }}" class="buy-btn-case buy-btn-case_position buy-btn-case_display_block buy-btn-case_size">
            <button type="button" class="modal-buy-button modal-body-buy__btn modal-buy-button_size_s modal-buy-button_transition"><?php echo $film->price; ?> р</button>
          </a>
        @else
          <a href="{{ route('login') }}" class="buy-btn-case buy-btn-case_position buy-btn-case_display_block buy-btn-case_size">
            <button type="button" class="modal-buy-button modal-body-buy__btn modal-buy-button_size_s modal-buy-button_transition"><?php echo $film->price; ?> р</button>
          </a>
        @endif
      </div>
      <div class="modal-body__item modal-body__item_size_s">
        <div class="modal-body-buy-title modal-body-buy__item">Rent</div>
        <div class="modal-body-buy-text modal-body-buy__text modal-body-buy__item">
          30 days to start watching, and 48 hours to finish the film
        </div>
        @if (Auth::check())
          <a href="{{ route('thanks_page_rent', ['film_id' => $film->id]) }}" class="buy-btn-case buy-btn-case_position buy-btn-case_display_block buy-btn-case_size">
            <button type="button" class="modal-buy-button modal-body-buy__btn modal-buy-button_size_s modal-buy-button_transition"><?php echo(intdiv(($film->price), 3)); ?> р</button>
          </a>
        @else
          <a href="{{ route('login') }}" class="buy-btn-case buy-btn-case_position buy-btn-case_display_block buy-btn-case_size">
            <button type="button" class="modal-buy-button modal-body-buy__btn modal-buy-button_size_s modal-buy-button_transition"><?php echo(intdiv(($film->price), 3)); ?> р</button>
          </a>
        @endif
      </div>
    </div>
    <div class="modal-footer modal__item">
      <button class="close-modal-btn modal-footer__item modal-body-buy__btn modal-buy-button_size_s modal-buy-button_transition modal-footer__item_display_block">Close</button>
    </div>
  </div>
</div>
@endsection
