@if ($paginator->hasPages())
    <div style="display: flex; justify-content: center;">
        <ul class="new-task__pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination__item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a style="color: #ffffff !important;" aria-hidden="true"></a>
                </li>
            @else
                <li class="pagination__item">
                    <a style="color: #ffffff !important;" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')"></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination__item" aria-disabled="true"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="pagination__item pagination__item--current" aria-current="page">
                                <a style="color: #ffffff !important;">{{ $page }}</a>
                            </li>
                        @else
                            <li class="pagination__item"><a style="color: #ffffff !important;"
                                    href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination__item">
                    <a style="color: #ffffff !important;" href="{{ $paginator->nextPageUrl() }}" rel="next"
                        aria-label="@lang('pagination.next')"></a>
                </li>
            @else
                <li class="pagination__item pagination__item--current" aria-disabled="true"
                    aria-label="@lang('pagination.next')">
                    <a style="color: #ffffff !important;" aria-hidden="true"></a>
                </li>
            @endif
        </ul>
    </div>
@endif
