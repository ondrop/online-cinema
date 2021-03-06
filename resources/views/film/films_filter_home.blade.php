@extends('layouts.app')

@section('content')

<div class="category-home category-home_overflow_hidden">
  <div class="films-page-background films-page-background_position category-home__item films-page-background_size films-page-background_size_s"></div>
  <div class="background-sign background-sign-shadow background-sign_size_s background-sign_size_m">grid page</div>
  <div class="background-sign background-sign_size_s">grid page</div>
  <div class="head-block category-home__head-block category-home__item category-home__head-block_size category-home__head-block_display_flex">
    @include('includes.side_bar')
    <div class="films-block head-block__films-block head-block__films-block_size_m">
      @yield('search')

      @if (!$films[0])
        <div class="films-block-header films-block__films-block-header films-block__item">
          <div class="header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s">
            <span class="header-text-case__item  shows-block-header-text_display_block">The Films are not found</span>
          </div>
        </div>
      @else
        <?php (((explode('?', $_SERVER['REQUEST_URI']))[0]) == '/search') ? $route = 'search' : $route = 'films_home' ; ?>
        @if ($route == 'films_home')
        <div class="films-block-header films-block__films-block-header films-block__item">
          <div class="header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s">
            <span class="header-text-case__item shows-block-header-text shows-block-header-text_display_block">{{ $filter_name }}</span>
          </div>
        </div>
        @endif
        <div class="films-block-header films-block__films-block-header films-block__item">
          <div class="films-block-header-case films-block-header__item films-block-header__item_size films-block-header-case_display_flex">
            <div class="view-case view-case_display_flex">
              <div class="view-button-case">
                <button class="view-button view-button-case__first view-button-case__item view-button-case__item_size"></button>
              </div>
              <div class="view-button-case">
                <button class="view-button view-button-case__item view-button-case__item_size"></button>
              </div>
            </div>
            <div class="sort-button-case sort-button-case_display_grid sort-button-case_size">
              <div class="sort-sropdown-case">
                <button id="sort-first" class="dropdown-button sort-button sort-button-case__sort-button sort-button_transition">
                  Sort by
                  <i class="fas fa-caret-down"></i>
                </button>
                <div id="sort-first-dropdown" class="dropdown-menu sort-button-case__dropdown-menu dropdown-menu_size">
                  <a class="dropdown-menu__item dropdown-menu__item_transition" href="{{ route($route, ['genre' => Request::input('genre'), 'release_year' => Request::input('release_year'), 'country' => Request::input('country')]) }}">in order</a>
                  <a class="dropdown-menu__item dropdown-menu__item_transition" href="{{ route($route, ['genre' => Request::input('genre'), 'release_year' => Request::input('release_year'), 'country' => Request::input('country'), 'sort' => 'have_bought', 'search_value' => Request::input('search_value')]) }}">on popularity</a>
                  <a class="dropdown-menu__item dropdown-menu__item_transition" href="{{ route($route, ['genre' => Request::input('genre'), 'release_year' => Request::input('release_year'), 'country' => Request::input('country'), 'sort' => 'release', 'search_value' => Request::input('search_value')]) }}">on the release date</a>
                </div>
              </div>
            </div>
            <div class="pagination-case films-block-header-case__pagination-case">
              {{ $films->withQueryString()->links() }}
            </div>
          </div>
        </div>

        <div class="category-films-case films-block__category-films-case films-block__item home-films-block_display_grid category-films-case_grid category-films-case_size">
          <?php foreach ($films as $film) : ?>
            <div class="category-film category-films-case__item">
              <div class="film-case-info film-case__info category-film-info category-film__info film-case-info_size_s film-case-info_overflow_hidden film-case-info_transition">
                <div class="film-image-case_gradient">
                  <img class="film-image film-case__image film-image_size" src="{{ $film->img_link }}">
                  <a href="{{ route('film_page', ['id' => $film->id]) }}" class="play-film-link play-film-link_position play-film-link_transition"></a>
                </div>
                <div class="film-info film-case-info__info film-case-info__info_transition category-film-info__info">
                  <div class="film-info-block film-info-block_display_table-cell film-info-block_size_s">
                    <a href="{{ route('film_page', ['id' => $film->id]) }}" class="film-info-block__item film-info-block__item_display_block">
                      {{ $film->film_name }}
                    </a>
                    <span class="film-category film-info__category film-info-block__item film-info-block__item_display_block">
                      {{ $film->genre . ', ' . $film->country . ', ' . $film->release_year }}
                    </span>
                    <span class="film-time film-info-block__item film-info-block__item_display_block">
                      <i class="far fa-clock"></i>
                      {{ $film->time }}
                    </span>
                  </div>
                </div>                     
              </div>
            </div>
          <?php endforeach ?>
        </div>
        <div class="films-block-header films-block__films-block-header films-block__item">
          <div class="films-block-header-case films-block-header__item films-block-header__item_size films-block-header-case_display_flex">
            <div class="view-case view-case_display_flex">
              <div class="view-button-case">
                <button class="view-button view-button-case__first view-button-case__item view-button-case__item_size"></button>
              </div>
              <div class="view-button-case">
                <button class="view-button view-button-case__item view-button-case__item_size"></button>
              </div>
            </div>
            <div class="sort-button-case sort-button-case_display_grid sort-button-case_size">
              <div class="sort-sropdown-case">
                <button id="sort-second" class="dropdown-button sort-button sort-button-case__sort-button sort-button_transition">
                  Sort by
                  <i class="fas fa-caret-up"></i>
                </button>
                <div id="sort-second-dropdown" class="dropdown-menu sort-button-case__dropdown-menu sort-button-case__dropdown-menu-up dropdown-menu_size">
                  <a class="dropdown-menu__item dropdown-menu__item_transition" href="{{ route($route, ['genre' => Request::input('genre'), 'release_year' => Request::input('release_year'), 'country' => Request::input('country')]) }}">in order</a>
                  <a class="dropdown-menu__item dropdown-menu__item_transition" href="{{ route($route, ['genre' => Request::input('genre'), 'release_year' => Request::input('release_year'), 'country' => Request::input('country'), 'sort' => 'have_bought']) }}">on popularity</a>
                  <a class="dropdown-menu__item dropdown-menu__item_transition" href="{{ route($route, ['genre' => Request::input('genre'), 'release_year' => Request::input('release_year'), 'country' => Request::input('country'), 'sort' => 'release']) }}">on the release date</a>
                </div>
              </div>
            </div>
            <div class="pagination-case films-block-header-case__pagination-case">
              {{ $films->withQueryString()->links() }}
            </div>
          </div>
        </div>
      @endif    
    </div>
  </div>   
</div>



@endsection
