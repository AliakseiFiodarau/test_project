@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <div class="button" aria-disabled="true" aria-label="@lang('pagination.previous')">
        </div>
    @else
        <div>
            <div class="button"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                                   aria-label="@lang('pagination.previous')">◄</a></div>
        </div>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <div class="button" >{{ $element }}</div>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <div class="this_button" >{{ $page }}</div>
                @else
                    <div class="button" ><a href="{{ $url }}">{{ $page }}</a></div>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <div class="button">
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">►</a>
        </div>
    @else
        <div class="button" aria-disabled="true" aria-label="@lang('pagination.next')">
        </div>
    @endif
@endif
