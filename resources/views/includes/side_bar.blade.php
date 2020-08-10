<div class="side-bar side-bar_size">
  <div id="category" class="category-header side-bar__header side-bar__item category-header_size dropdown-button">
    <span class="category-header__item">Category</span>
  </div>
  <div id="category-dropdown" class="category side-bar__category side-bar__item side-bar__category_overflow_hidden dropdown-menu">
    <a href="{{ route('films_home') }}" class="first-category category__item category__item_transition category__item_display_flex">
      Home
      <i class="category-icon category-icon_transform category-icon_display_block fas fa-home"></i>
    </a>
    <a href="{{ route('films_home', ['genre' => 'Жанр 4']) }}" class="second-category category__item category__item_transition category__item_display_flex">
      Genre 4 
      <i class="category-icon category-icon_transform category-icon_display_block fas fa-theater-masks"></i>
    </a>
    <a href="{{ route('films_home', ['country' => 'Страна №1']) }}" class="first-category category__item category__item_transition category__item_display_flex">
      Country №1
      <i class="category-icon category-icon_transform category-icon_display_block far fa-compass"></i>
    </a>
  </div>
  <div id="filter" class="category-header category-header-filter side-bar__header side-bar__item category-header_size dropdown-button">
    <span class="category-header__item">Filter</span>
  </div>
  <form id="filter-dropdown" method="GET" action="{{ route('films_home')}}" class="filter side-bar__filter category side-bar__category side-bar__item side-bar__category_overflow_hidden dropdown-menu">
    <div class="filter__item filter-block filter__item_size">
      <span class="filter-label filter-block__label filter-label_display_block">Genre</span>
      <div id="genre" class="filter-block__select filter-block__select_size filter-block__select_appearance_none filter-block-select-arrow filter-block__select_transition">
        <?php echo (Request::input('genre')) ? Request::input('genre') : 'Genre';?>
      </div>
      <ul id="genre-select" class="select-list select-list_size">
        <li class="select-list__item">
          <label class="select-input-label">
            <input type="radio" name="genre" checked value="Genre" class="select-input">
            Genre
          </label>
        </li>
        <?php foreach ($genre as $value) : ?>
          <li class="select-list__item">
            <label class="select-input-label">
              <input type="radio" name="genre" <?php echo (Request::input('genre') == $value['genre']) ? 'checked' : ''; ?> value="{{ $value['genre'] }}" class="select-input">
              {{ $value['genre'] }}
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div class="filter__item filter-block filter__item_size">
      <span class="filter-label filter-block__label filter-label_display_block">Year</span>
      <div id="release-year" class="filter-block__select filter-block__select_size filter-block__select_appearance_none filter-block-select-arrow filter-block__select_transition">
        <?php echo (Request::input('release_year')) ? Request::input('release_year') : 'Year';?>
      </div>
      <ul id="release-year-select" class="select-list select-list_size">
        <li class="select-list__item">
          <label class="select-input-label">
            <input type="radio" name="release_year" checked value="Year" class="select-input">
            Year
          </label>
        </li>
        <?php for ($i = 1910; $i <= Carbon\Carbon::now()->year; $i++) : ?>
          <li class="select-list__item">
            <label class="select-input-label">
              <input type="radio" name="release_year" <?php echo (Request::input('release_year') == $i) ? 'checked' : ''; ?> value="<?php echo $i; ?>" class="select-input">
              <?php echo $i; ?>
            </label>
          </li>
        <?php endfor; ?>
      </ul>
    </div>
    <div class="filter__item filter-block filter__item_size">
      <span class="filter-label filter-block__label filter-label_display_block">Country</span>
      <div id="country" class="filter-block__select filter-block__select_size filter-block__select_appearance_none filter-block-select-arrow filter-block__select_transition">
        <?php echo (Request::input('country')) ? Request::input('country') : 'Country';?>
      </div>
      <ul id="country-select" class="select-list select-list_size">
        <li class="select-list__item">
          <label class="select-input-label">
            <input type="radio" name="country" checked value="Country" class="select-input">
            Country
          </label>
        </li>
        <?php foreach ($country as $value) : ?>
          <li class="select-list__item">
            <label class="select-input-label">
              <input type="radio" name="country" <?php echo (Request::input('country') == $value['country']) ? 'checked' : ''; ?> value="{{ $value['country'] }}" class="select-input">
              {{ $value['country'] }}
            </label>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
    <div onclick="event.stopPropagation();" class="filter__item filter__button-case filter__item_size">
      <button type="submit" class="filter-btn filter__filter-btn filter-btn_size filter__filter-btn_transition">
        Find Film
      </button>
    </div>
  </form>
</div>
