@if ($paginator->hasPages())
    <div class="pagination">
        <!-- Šípka "Previous" -->
        @if ($paginator->onFirstPage())
            <button class="disabled" aria-disabled="true">
                «
            </button>
        @else
            <a href="{{ $paginator->previousPageUrl() . (request()->query() ? '&' . http_build_query(request()->query()) : '') }}" class="pagination-link">
                <button>
                    «
                </button>
            </a>
        @endif

        <!-- Čísla stránok -->
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="page-number disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-number active-page">{{ $page }}</span>
                    @else
                        <a href="{{ $url . (request()->query() ? '&' . http_build_query(request()->query()) : '') }}" class="pagination-link">
                            <span class="page-number">{{ $page }}</span>
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        <!-- Šípka "Next" -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() . (request()->query() ? '&' . http_build_query(request()->query()) : '') }}" class="pagination-link">
                <button>
                    »
                </button>
            </a>
        @else
            <button class="disabled" aria-disabled="true">
                »
            </button>
        @endif

        <!-- Text "Showing 1 to 10 of 11 results" -->
        <span>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results</span>
    </div>
@endif