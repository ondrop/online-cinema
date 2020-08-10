@extends('layouts.app')

@section('content')

<div class="auth-case profile-case profile-case_position profile-case_size_m">
  <div class="auth profile profile-case__item auth-case__item auth_size_s auth_size_m">
    <div class="auth-header auth__auth-header auth__item auth-header_display_flex">
      <span class="auth-header__title">{{ Auth::user()->name }}</span>
    </div>
    <div class="tab-case tab-case_display_flex">
      <div class="tab-list tab-case__item tab-case__item_size_s tab-case__tab-list tab-case__tab-list_overflow_hidden">
        <a href="#" id="tab-list-films" class="tab-list__item tab-list__item_transition tab-list__item_display_flex <?php echo ( !($errors->hasBag()) ) ? 'tab-list_active' : ''; ?>">
          My films
        </a>
        <a href="#" id="tab-list-setting" class="tab-list__item tab-list__item_transition tab-list__item_display_flex <?php echo ($errors->hasBag()) ? 'tab-list_active' : ''; ?>">
          Setting
        </a>
        <a class="tab-list__item tab-list__item_transition tab-list__item_display_flex" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          Logout
        </a>
      </div>
      <div class="tab-content tab-case__content tab-case__item tab-content_size_m">

        <div id="tab-pane-films" class="tab-pane-films tab-pane tab-content__item tab-content__item_display_none <?php echo ( !($errors->hasBag()) ) ? 'show-tab-pane' : ''; ?>">

          @if (!$rent[0] && !$purchased[0])
            <div class="tab-pane-films-header tab-pane-films__films-block-header tab-pane-films__item">
              <div class="tab-pane-films-header__item tab-pane-films-header__item_display_grid header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s shows-block-header__item_size_x">
                <span class="header-text-case__item shows-block-header-text shows-block-header-text_display_block tab-pane-header_text-size_m">The Films are not found</span>
              </div>
            </div>
          @else  
            <div class="tab-pane-films-header tab-pane-films__films-block-header tab-pane-films__item">
              <div class="tab-pane-films-header__item tab-pane-films-header__item_display_grid header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s shows-block-header__item_size_x">
                <span class="tab-pane-films-header-text header-text-case__item shows-block-header-text shows-block-header-text_display_block tab-pane-header_text-size_m">My films:</span>
                <div class="rent-pagination_position pagination-case films-block-header-case__pagination-case">
                  {{ $rent->withQueryString()->links() }}
                </div>
              </div>
            </div>

            @if ($rent[0])
              <div class="tab-pane-films-header tab-pane-films__films-block-header tab-pane-films__item">
                <div class="tab-pane-films-header__item tab-pane-films-header__item_display_grid header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s shows-block-header__item_size_x">
                  <span class="header-text-case__item shows-block-header-text_display_block">Rented:</span>
                  
                </div>
              </div>
              <div class="tab-pane-films__body tab-pane-films-body">
                <?php foreach ($rent as $film) : ?>
                  <div class="tab-pane-films-info-case tab-pane-films-body__item tab-pane-films-body__item_size">
                    <div class="tab-pane-films-info tab-pane-films-info-case__item tab-pane-films-info_display_flex tab-pane-films-info_size_s">
                      <a href="{{ route('film_page', ['id' => $film->id]) }}" class="tab-pane-films-info__name tab-pane-films-info__item tab-pane-films-info__item_display_block">{{ $film->film_name }}</a>
                      <div class="tab-pane-films-info__category tab-pane-films-info__item">До:  
                        <span class="rent-time">{{ $film->delete_after . ', ' }}</span>
                        {{ $film->genre . ', ' . $film->country . ', ' . $film->release_year }}
                      </div>    
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            @endif

            @if ($purchased[0])
              <div class="tab-pane-films-header tab-pane-films__films-block-header tab-pane-films__item">
                <div class="tab-pane-films-header__item tab-pane-films-header__item_display_grid header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s shows-block-header__item_size_x">
                  <span class="header-text-case__item shows-block-header-text_display_block">Bought:</span>
                </div>
              </div>
              <div class="tab-pane-films__body tab-pane-films-body">
                <?php foreach ($purchased as $film) : ?>
                  <div class="tab-pane-films-info-case tab-pane-films-body__item tab-pane-films-body__item_size">
                    <div class="tab-pane-films-info tab-pane-films-info-case__item tab-pane-films-info_display_flex tab-pane-films-info_size_s">
                      <a href="{{ route('film_page', ['id' => $film->id]) }}" class="tab-pane-films-info__name tab-pane-films-info__item tab-pane-films-info__item_display_block">{{ $film->film_name }}</a>
                      <div class="tab-pane-films-info__category tab-pane-films-info__item">{{ $film->genre . ', ' . $film->country . ', ' . $film->release_year }}</div>    
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            @endif
               
          @endif    
        </div>
        

        <form id="tab-pane-setting" method="POST" action="{{ route('change_profile') }}" class="tab-pane tab-pane-form_position tab-content__item auth-form auth__auth-form auth__item tab-content__item_display_none <?php echo ($errors->hasBag()) ? 'show-tab-pane' : ''; ?>">
          @csrf

          <div class="profile-form-block profile-form-block_display_flex auth-form-block auth-form__item">
            <label for="name" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('Name') }}</label>
            <div class="profile-input-case profile-input-case_position auth-input-case auth-form-block__item">
              <input id="name" type="text" class="auth-input auth-input-case__item auth-input_size_s @error('name') invalid-input-data @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name">
              @error('name')
                <span class="invalid-input-data-message invalid-input-data-message_size invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="profile-form-block profile-form-block_display_flex auth-form-block auth-form__item">
            <label for="email" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('E-Mail Address') }}</label>
            <div class="profile-input-case profile-input-case_position  auth-input-case auth-form-block__item">
              <input id="email" type="email" class="auth-input auth-input-case__item auth-input_size_s @error('email') invalid-input-data @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
              @error('email')
                <span class="invalid-input-data-message invalid-input-data-message_size invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="auth-form-block auth-form__auth-btn-case auth-form__item">
            <div class="auth-btn-case auth-btn-case_position">
              <button type="submit" class="auth-btn auth-btn-case__btn  auth-btn-case__item auth-btn_transition">
                Save changes
              </button>
            </div>
          </div>
        </form>
      </div>    
    </div>
  </div>
</div>
@endsection
