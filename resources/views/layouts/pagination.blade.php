{{-- <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#" class="active">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
</div> --}}

@if ($paginator->hasPages())
    <div class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="disabled" aria-disabled="true">&laquo;</a>
        @else
            {{-- <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                    aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li> --}}
            <a href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{-- <li class="page-item disabled" aria-disabled="true"><span
                        class="page-link">{{ $element }}</span></li> --}}
                <a aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        {{-- <li class="page-item active" aria-current="page"><span
                                class="page-link">{{ $page }}</span></li> --}}
                        <a aria-current="page" class="active">{{ $page }}</a>
                    @else
                        {{-- <li class="page-item"><a class="page-link"
                                href="{{ $url }}">{{ $page }}</a></li> --}}
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            {{-- <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                    aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li> --}}
            <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">&raquo;</a>
        @else
            {{-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li> --}}
            <a class="disabled" aria-disabled="true">&raquo;</a>
        @endif
    </div>
@endif
