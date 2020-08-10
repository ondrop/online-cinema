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
