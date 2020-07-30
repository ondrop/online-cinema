<div class="side-bar side-bar_size">
  <div class="category-header side-bar__header side-bar__item category-header_size">
    <span class="category-header__item">Category</span>
  </div>
  <div class="category side-bar__category side-bar__item side-bar__category_overflow_hidden">
    <a href="{{ route('films_home') }}" class="first-category category__item category__item_transition category__item_display_flex">
      Home
      <i class="category-icon first-category__icon category-icon_filter category-icon_display_block category-icon_transform"></i>
    </a>
    <a href="{{ route('films_home', ['genre' => 'Жанр 4']) }}" class="second-category category__item category__item_transition category__item_display_flex">
      Genre 4 
      <i class="category-icon second-category__icon category-icon_filter category-icon_display_block category-icon_transform"></i>
    </a>
    <a href="{{ route('films_home', ['country' => 'Страна №1']) }}" class="first-category category__item category__item_transition category__item_display_flex">
      Country №1
      <i class="category-icon first-category__icon category-icon_filter category-icon_display_block category-icon_transform"></i>
    </a>
  </div>
  <div class="category-header side-bar__header side-bar__item category-header_size">
    <span class="category-header__item">Filter</span>
  </div>
  <form method="GET" action="{{ route('films_home')}}" class="filter side-bar__filter category side-bar__category side-bar__item side-bar__category_overflow_hidden">
    <div class="filter__item filter-block filter__item_size">
      <label for="genre" class="category-icon_display_blockfilter-label filter-block__label filter-label_display_block">Genre</label>
      <select id="genre" name="genre" class="filter-block__select filter-block__select_size filter-block__select_appearance_none filter-block-select-arrow filter-block__select_transition">
        <option selected>Genre</option>
        <?php foreach ($genre as $value) : ?>
          <option value="{{ $value['genre'] }}">{{ $value['genre'] }}</option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="filter__item filter-block filter__item_size">
      <label for="release_year" class="filter-label filter-block__label filter-label_display_block">Year</label>
      <select id="release_year" name="release_year" class="filter-block__select filter-block__select_size filter-block__select_appearance_none filter-block-select-arrow filter-block__select_transition">
        <option selected>Year</option>
        <?php for ($i = 1910; $i <= Carbon\Carbon::now()->year; $i++) : ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
      </select>
    </div>
    <div class="filter__item filter-block filter__item_size">
      <label for="country" class="filter-label filter-block__label filter-label_display_block">Country</label>
      <select id="country" name="country" class="filter-block__select filter-block__select_size filter-block__select_appearance_none filter-block-select-arrow filter-block__select_transition">
        <option selected>Country</option>
        <?php foreach ($country as $value) : ?>
          <option value="{{ $value['country'] }}">{{ $value['country'] }}</option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="filter__item filter__button-case filter__item_size">
      <button type="submit" class="filter-btn filter__filter-btn filter-btn_size filter__filter-btn_transition">
        Find Film
      </button>
    </div>
  </form>
</div>
