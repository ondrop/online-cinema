@if ($paginator->hasPages())
  <nav class="pagination pagination_size">
    <ul class="pagination-list pagination__item">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="pagination-list__item pagination-list__item_size pagination-list__item_display_inline-block disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <span class="arrow-paginaion-link pagination-page-link pagination-page-link_size pagination-page-link_display_block" aria-hidden="true">&lsaquo;</span>
        </li>
      @else
        <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size">
          <a class="arrow-paginaion-link pagination-page-link pagination-page-link_size pagination-page-link_display_block" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        </li>
      @endif

      <?php
        $start = $paginator->currentPage() - 1;
        $end = $paginator->currentPage() + 1; 
        if($start < 1) {
          $start = 1; // reset start to 1
          $end += 1;
        } 
        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
      ?>

      @if($start > 1)
        <li class="pagination-list__item pagination-list__item_size pagination-list__item_display_inline-block disabled">
          <a class="pagination-page-link pagination-page-link_size pagination-page-link_display_block" href="{{ $paginator->url(1) }}">{{1}}</a>
        </li>
        @if($paginator->currentPage() != 3)
          {{-- "Three Dots" Separator --}}
          <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size disabled" aria-disabled="true"><span class="pagination-page-link pagination-page-link_size pagination-page-link_display_block">...</span></li>
        @endif
      @endif
        @for ($i = $start; $i <= $end; $i++)
          <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="pagination-page-link pagination-page-link_size pagination-page-link_display_block" href="{{ $paginator->url($i) }}">{{$i}}</a>
          </li>
        @endfor
      @if($end < $paginator->lastPage())
        @if($paginator->currentPage() + 3 != $paginator->lastPage())
          {{-- "Three Dots" Separator --}}
          <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size disabled" aria-disabled="true"><span class="pagination-page-link pagination-page-link_size pagination-page-link_display_block">...</span></li>
        @endif
        <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size">
          <a class="pagination-page-link pagination-page-link_size pagination-page-link_display_block" href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
        </li>
      @endif

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size">
          <a class="arrow-paginaion-link pagination-page-link pagination-page-link_size pagination-page-link_display_block" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
        </li>
      @else
        <li class="pagination-list__item pagination-list__item_display_inline-block pagination-list__item_size disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
          <span class="arrow-paginaion-link pagination-page-link pagination-page-link_size pagination-page-link_display_block" aria-hidden="true">&rsaquo;</span>
        </li>
      @endif
    </ul>
  </nav>
@endif
