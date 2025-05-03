@extends('layouts.app')

@section('title', 'Poháre - Keramo.sk')

@section('content')
<section class="products">
    <h2>Poháre</h2>
    <div class="filter-container">
        <input type="checkbox" id="filter-toggle" class="filter-checkbox">
        <label for="filter-toggle" class="filter-button">
            <i class="fas fa-filter"></i> Filtrovať
        </label>
        <form class="filter-options" method="GET" action="{{ route('cups') }}">
            <div class="price-section">
                <label>Cena:</label>
                <input type="range" id="price_range" name="price_max" min="0" max="500" value="{{ request('price_max', 500) }}" step="1" class="price_range">
                <div class="price-range-values">
                    <span id="price-min">0</span> - <span id="price-max">{{ request('price_max', 500) }}</span>
                </div>
            </div>
            <div class="filter-section">
                <label>Farba:</label>
                <div class="color-options">
                    <label>
                        <input type="radio" name="color" value="biela" {{ request('color') == 'biela' ? 'checked' : '' }}>
                        <span class="color-box" style="background-color: white;"></span> Biela
                    </label>
                    <label>
                        <input type="radio" name="color" value="modrá" {{ request('color') == 'modrá' ? 'checked' : '' }}>
                        <span class="color-box" style="background-color: blue;"></span> Modrá
                    </label>
                    <label>
                        <input type="radio" name="color" value="červená" {{ request('color') == 'červená' ? 'checked' : '' }}>
                        <span class="color-box" style="background-color: red;"></span> Červená
                    </label>
                    <label>
                        <input type="radio" name="color" value="zelená" {{ request('color') == 'zelená' ? 'checked' : '' }}>
                        <span class="color-box" style="background-color: green;"></span> Zelená
                    </label>
                </div>
            </div>
            <div class="filter-section">
                <label>Rozmery:</label>
                <label><input type="radio" name="size" value="malý" {{ request('size') == 'malý' ? 'checked' : '' }}> Malé</label>
                <label><input type="radio" name="size" value="stredný" {{ request('size') == 'stredný' ? 'checked' : '' }}> Stredné</label>
                <label><input type="radio" name="size" value="veľký" {{ request('size') == 'veľký' ? 'checked' : '' }}> Veľké</label>
            </div>
            <button type="submit">Aplikovať filtre</button>
        </form>
    </div>

    <div class="sort-container">
        <input type="checkbox" id="sort-toggle" class="sort-checkbox">
        <label for="sort-toggle" class="sort-button">
            <i class="fas fa-sort"></i> Triediť podľa
        </label>
        <form class="sort-options" method="GET" action="{{ route('cups') }}">
            <label><input type="radio" name="sort" value="najlacnejsie" {{ request('sort') == 'najlacnejsie' ? 'checked' : '' }}> Najlacnejšie</label>
            <label><input type="radio" name="sort" value="najdrahsie" {{ request('sort') == 'najdrahsie' ? 'checked' : '' }}> Najdrahšie</label>
            <label><input type="radio" name="sort" value="najnovsie" {{ request('sort') == 'najnovsie' ? 'checked' : '' }}> Najnovšie</label>
            <label><input type="radio" name="sort" value="najoblubenejsie" {{ request('sort') == 'najoblubenejsie' ? 'checked' : '' }}> Najobľúbenejšie</label>
            <button type="submit">Zoradiť</button>
        </form>
    </div>

    @foreach ($products as $product)
        <div class="product-item">
            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}" class="product-image">
            </a>
            <h3>{{ $product->nazov }}</h3>
            <p>{{ $product->popis }}</p>
            <p class="price">{{ number_format($product->cena, 2) }}€</p>

            <form action="{{ route('favorites.add', ['slug' => $product->slug]) }}" method="POST" class="favorite-form">
                @csrf
                <button class="heart-icon favorite-button {{ in_array($product->id, $favoritedIds) ? 'favorited' : '' }}" data-slug="{{ $product->slug }}">
                    <i class="fas fa-heart"></i>
                </button>
            </form>
        </div>

    @endforeach

    @if ($products->hasPages())
        <div class="pagination">
            <!-- Šípka "Previous" -->
            @if ($products->onFirstPage())
                <button class="disabled" aria-disabled="true">«</button>
            @else
                <a href="{{ $products->previousPageUrl() }}" class="pagination-link">
                    <button>«</button>
                </a>
            @endif

            <!-- Čísla stránok -->
            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page == $products->currentPage())
                    <span class="page-number active-page">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="pagination-link">
                        <span class="page-number">{{ $page }}</span>
                    </a>
                @endif
            @endforeach

            <!-- Šípka "Next" -->
            @if ($products->hasMorePages())
                <a href="{{ $products->nextPageUrl() }}" class="pagination-link">
                    <button>»</button>
                </a>
            @else
                <button class="disabled" aria-disabled="true">»</button>
            @endif

            <!-- Text "Showing 1 to 10 of 11 results" -->
            <span>Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results</span>
        </div>
    @endif
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.favorite-button').forEach(function(button) {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const slug = this.getAttribute('data-slug');

                fetch("{{ route('favorites.toggle') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ slug: slug })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.favorited) {
                        button.classList.add('favorited');
                    } else {
                        button.classList.remove('favorited');
                    }
                })
                .catch(error => console.error('Chyba pri pridaní do obľúbených:', error));
            });
        });
    });
</script>
@endpush
