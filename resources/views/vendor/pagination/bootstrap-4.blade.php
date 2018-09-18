@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-label="@lang('pagination.previous')"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
        @else
            <li class="waves-effect" aria-label="@lang('pagination.previous')"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="material-icons">chevron_left</i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                {{-- <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li> --}}
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="">{{ $page }}</a></li>
                    @else
                        <li class="waves-effect"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect" aria-label="@lang('pagination.next')"><a href="{{ $paginator->nextPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="material-icons">chevron_right</i></a></li>
        @else
            <li class="disabled" aria-label="@lang('pagination.next')"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        @endif
    </ul>
@endif
