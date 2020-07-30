@extends('layouts.app')

@section('content')
<div class="auth-case auth-case_position">
  <div class="auth auth-case__item auth_size_s">
    <div class="auth-header auth__auth-header auth__item auth-header_display_flex">
      <span class="auth-header__title">{{ __('Login') }}</span>
      <a href="{{ route('register') }}" class="auth-btn auth-header__item auth-header__item_display_block auth-btn_transition">
        or register
      </a>
    </div>
    <form method="POST" action="{{ route('login') }}" class="auth-form auth__auth-form auth__item">
      @csrf

      <div class="auth-form-block auth-form__item">
        <label for="email" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('E-Mail Address') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="email" type="email" class="auth-input auth-input-case__item auth-input_size_s @error('email') invalid-input-data @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          @error('email')
            <span class="invalid-input-data-message invalid-input-data-message_size invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <label for="password" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('Password') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="password" type="password" class="auth-input auth-input-case__item auth-input_size_s @error('password') invalid-input-data @enderror" name="password" required autocomplete="current-password">
          @error('password')
            <span class="invalid-input-data-message invalid-input-data-message_size  invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="" for="remember">
          {{ __('Remember Me') }}
        </label>
      </div>
      <div class="auth-form-block auth-form__auth-btn-case auth-form__item">
        <div class="auth-btn-case auth-btn-case_position">
          <button type="submit" class="auth-btn auth-btn-case__btn  auth-btn-case__item auth-btn_transition">
            {{ __('Login') }}
          </button>
          @if (Route::has('password.request'))
            <a class="forgot-password auth-btn-case__item" href="#">
              {{ __('Forgot Your Password?') }}
            </a>
          @endif
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
