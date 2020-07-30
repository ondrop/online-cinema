@extends('film.films_filter_home')

@section('search')
<div class="films-block-header films-block__films-block-header films-block__item">
  <div class="header-text-case shows-block-header__item shows-block-header__item_size_m shows-block-header__item_size_s">
    <span class="header-text-case__item shows-block-header-text shows-block-header-text_display_block">Результаты поиска: "{{ $search_value }}"</span>
  </div>
</div>
@endsection
