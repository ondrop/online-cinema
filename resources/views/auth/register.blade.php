@extends('layouts.app')

@section('content')
<div class="auth-case auth-case_position">
  <div class="auth auth-case__item auth_size_s">
    <div class="auth-header auth__auth-header auth__item">{{ __('Register') }}</div>
    <form method="POST" action="{{ route('register') }}" class="auth-form auth__item">
      @csrf

      <div class="auth-form-block auth-form__item">
        <label for="name" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('Name') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="name" type="text" class="auth-input auth-input-case__item auth-input_size_s @error('name') invalid-input-data @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          @error('name')
            <span class="invalid-input-data-message invalid-input-data-message_size invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <label for="email" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('E-Mail Address') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="email" type="email" class="auth-input auth-input-case__item auth-input_size_s @error('email') invalid-input-data @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
          @error('email')
            <span class="invalid-input-data-message invalid-input-data-message_size invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <label for="nickname" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('Nickname') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="nickname" type="text" class="auth-input auth-input-case__item auth-input_size_s @error('nickname') invalid-input-data @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname">
          @error('nickname')
            <span class="invalid-input-data-message invalid-input-data-message_size invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <label for="password" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('Password') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="password" type="password" class="auth-input auth-input-case__item auth-input_size_s @error('password') invalid-input-data @enderror" name="password" required autocomplete="new-password">
          @error('password')
            <span class="invalid-input-data-message invalid-input-data-message_size  invalid-input-data-message_display_block invalid-input-data-message_position" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <label for="password-confirm" class="label-auth auth-form-block__item auth-form-block__item_display_block">{{ __('Confirm Password') }}</label>
        <div class="auth-input-case auth-form-block__item">
          <input id="password-confirm" type="password" class="auth-input auth-input-case__item auth-input_size_s" name="password_confirmation" required autocomplete="new-password">
        </div>
      </div>
      <div class="auth-form-block auth-form__item">
        <div class="auth-btn-case auth-btn-case_position">
          <button type="submit" class="auth-btn auth-btn-case__btn  auth-btn-case__item auth-btn_transition">
            {{ __('Register') }}
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
