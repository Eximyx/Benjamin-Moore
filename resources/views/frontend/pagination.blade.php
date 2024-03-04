{{--TODO FRONT: 1. Увеличить размер фона пагинации - DONE, Back-end: change amount of pagination buttons on mobile--}}
<div class="pagination">
    <ul class="pagination-ul">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pagination-item disabled">
                <a href="#">
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L1 6L5 11" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </li>
        @else
            <li class="pagination-item">
                <a href="{{ $paginator->previousPageUrl() }}">
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 1L1 6L5 11" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pagination-item disabled" aria-disabled="true">{{ $element }}</li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pagination-item-active"><a href="#">{{$page}}</a></li>
                    @else
                        <li class="pagination-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pagination-item">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 11L5 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </li>
        @else
            <li class="pagination-item disabled">
                <a href="#">
                    <svg width="6" height="12" viewBox="0 0 6 12" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 11L5 6L1 1" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </a>
            </li>
        @endif
    </ul>
</div>
