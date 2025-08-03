@if ($paginator->hasPages())
    <nav>
        <ul class="ui pagination menu" style="background-color: #1D1E20">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class=" item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i class="left chevron icon"></i>
                </li>
            @else
                <a class="item " href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                    <i class="left chevron icon"></i>
                </a>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <a class="item disabled " aria-disabled="true">{{ $element }}</a>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="item active " style="background-color: #137f50" aria-current="page">{{ $page }}</a>
                        @else
                            <a class="item " href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                    <a class="item " href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <i class="right chevron icon"></i>
                    </a>
            @else
                <li class="item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <i class="right chevron icon"></i>
                </li>
            @endif
        </ul>
    </nav>
@endif
