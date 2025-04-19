@if ($paginator->hasPages())
    <ul class="pagination">
        <li class="{{ $paginator->onFirstPage() ? 'disabled' : '' }}">
            <a class="pagination-link" href="{{ $paginator->onFirstPage() ? '#' : $paginator->previousPageUrl() }}"><</a>
        </li>
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <li >
                        <a class="pagination-link {{ $page == $paginator->currentPage() ? 'active' : '' }}" href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach
        <li class="{{ $paginator->hasMorePages() ? '' : 'disabled' }}">
            <a class="pagination-link" href="{{ $paginator->hasMorePages() ? $paginator->nextPageUrl() : '#' }}">></a>
        </li>
    </ul>
@endif
