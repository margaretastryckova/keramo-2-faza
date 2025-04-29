@if ($paginator->hasPages())
    <div class="pagination">
        <!-- Šípka "Previous" -->
        @if ($paginator->onFirstPage())
            <button class="disabled" aria-disabled="true">«</button>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link">
                <button>«</button>
            </a>
        @endif

        <!-- Čísla stránok -->
        @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
            @if ($page == $paginator->currentPage())
                <span class="page-number active-page">{{ $page }}</span>
            @else
                <a href="{{ $url }}" class="pagination-link">
                    <span class="page-number">{{ $page }}</span>
                </a>
            @endif
        @endforeach

        <!-- Šípka "Next" -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link">
                <button>»</button>
            </a>
        @else
            <button class="disabled" aria-disabled="true">»</button>
        @endif

        <!-- Text "Showing 1 to 10 of 11 results" -->
        <span>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} results</span>
    </div>
@endif