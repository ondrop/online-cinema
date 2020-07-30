<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name')}}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
  <!-- Styles -->
  <link href="{{ asset('css/all.css') }}" rel="stylesheet">
<body>
    <nav class="menu menu_position">
      <div class="menu-block menu__block menu__block_display_flex menu__block_size">
        <a class="logo menu-block__logo menu-block__item_size" href="{{ route('home') }}">
          <img src="/storage/images/logo.jpg" class="logo__img">
        </a>
        <div class="menu-block-other menu-block__item menu-block__item_display_flex">

          <ul class="list menu-block-other-list menu-block-other__item">
            <li class="list__item list__item_size list__item_display_inline-block">
              <a class="page-link" href="{{ route('films_home') }}">Movies</a>
            </li>
            <li class="list__item list__item_size list__item_display_inline-block">
              <a class="page-link" href="{{ route('tv_series_home') }}">Tv Series</a>
            </li>
            <li class="list__item list__item_size list__item_display_inline-block">
              <a class="page-link" href="">Premium</a>
            </li>
          </ul>

          <form method="GET" action="{{ route('search') }}" class="search-form menu-block-other__item">
            <div class="search-form-block search-form__item search-form__item_size">
              <input class="search-form-block-input search-form-block__item search-form-block-input_size" type="search" aria-label="Search" name="search_value" autocomplete="off" placeholder="Search">
              <button class="search-form-btn search-form-block__item" type="submit">
                <i class="search-form-btn__item search-icon search-icon_size"></i>
              </button>
            </div>
          </form>

          <ul class="auth-list menu-block-other__item auth-list_size auth-list_transition">
            <!-- Authentication Links -->
            @guest
              <li class="auth-list-li auth-list__item auth-list__item_display_inline">
                <a class="auth-link auth-link__login auth-list-li__item auth-link_display_block auth-link_size" href="{{ route('login') }}">
                  <span class="auth-icon auth-link_item auth-icon_transform"></span>
                  {{ __('Login') }}
                </a>
              </li>
            @else
              <li class="auth-list-li auth-list__item auth-list__item_display_inline">
                <a class="auth-link auth-list-li__item auth-link_display_block auth-link_size" href="{{ route('profile') }}">
                  {{ Auth::user()->name }}
                </a>

                <div class="auth-menu auth-menu_opacity auth-menu_transition">
                  <a class="auth-menu__item auth-menu__item_display_block" href="{{ route('profile') }}">Профиль</a>
                  <a class="auth-menu__item auth-menu__item_display_block" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выйти
                  </a>

                  <form id="logout-form" class="logout-form logout-form_display_none" action="{{ route('logout') }}" method="POST">
                    @csrf
                  </form>
                </div>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>

    <main class="main-case">
      @yield('content')
    </main>
    <footer class="footer">
      <div class="footer-block footer__item footer__item_size footer__item_display_flex">
        <ul class="footer-block__item footer-block-list">
          <li class="footer-block-list__item footer-block-list__item_inline_block">
            <a class="footer-block-list-link" href="">Terms</a>
          </li>
          <li class="footer-block-list__item footer-block-list__item_inline_block">
            <a class="footer-block-list-link" href="">Privacy</a>
          </li>
          <li class="footer-block-list__item footer-block-list__item_inline_block">
            <a class="footer-block-list-link" href="">About</a>
          </li>
          <li class="footer-block-list__item footer-block-list__item_inline_block">
            <a class="footer-block-list-link" href="">Our Ads</a>
          </li>
          <li class="footer-block-list__item footer-block-list__item_inline_block">
            <a class="footer-block-list-link" href="">Feedback</a>
          </li>
        </ul>
        <div class="footer-block__item footer-sign footer-block__sign">
          <span class="footer-sign__item">CopyRight © 2019 Design by24webpro. All Rights Reserved.</span>
        </div>
      </div>
    </footer>
</body>
</html>
