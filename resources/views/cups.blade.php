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
                    <div class="price-range-wrapper">
                        <div id="range-track"></div>
                        <input type="range" id="price_min" name="price_min" min="0" max="150" value="{{ request('price_min', 0) }}" step="1">
                        <input type="range" id="price_max" name="price_max" min="0" max="150" value="{{ request('price_max', 150) }}" step="1">
                    </div>
                    <div class="price-range-values">
                        <span id="price-min-value">{{ request('price_min', 0) }}</span>€ - 
                        <span id="price-max-value">{{ request('price_max', 150) }}</span>€
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
                        <label>
                            <input type="radio" name="color" value="hnedá" {{ request('color') == 'hnedá' ? 'checked' : '' }}>
                            <span class="color-box" style="background-color: brown;"></span> Hnedá
                        </label>
                        <label>
                            <input type="radio" name="color" value="ružová" {{ request('color') == 'ružová' ? 'checked' : '' }}>
                            <span class="color-box" style="background-color: pink;"></span> Ružová
                        </label>
                        <label>
                            <input type="radio" name="color" value="žltá" {{ request('color') == 'žltá' ? 'checked' : '' }}>
                            <span class="color-box" style="background-color: yellow;"></span> Žltá
                        </label>
                    </div>
                </div>
                <div class="filter-section">
                    <label>Rozmery:</label>
                    <label><input type="radio" name="size" value="malý" {{ request('size') == 'malý' ? 'checked' : '' }}> Malé</label>
                    <label><input type="radio" name="size" value="stredný" {{ request('size') == 'stredný' ? 'checked' : '' }}> Stredné</label>
                    <label><input type="radio" name="size" value="veľký" {{ request('size') == 'veľký' ? 'checked' : '' }}> Veľké</label>
                </div>
                <button type="submit" id="apply">Aplikovať filtre</button>
                <button type="button" id="reset">Vymazať filtre</button>
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
                <!-- <label><input type="radio" name="sort" value="najoblubenejsie" {{ request('sort') == 'najoblubenejsie' ? 'checked' : '' }}> Najobľúbenejšie</label> -->
                <button type="submit">Zoradiť</button>
            </form>
        </div>

        @foreach ($products as $product)
            <div class="product-item">
                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                    @php
                        $imagePath = \Illuminate\Support\Str::startsWith($product->obrazok, 'products/')
                            ? asset('storage/' . $product->obrazok)
                            : asset($product->obrazok);
                    @endphp

                    <img src="{{ $imagePath }}" alt="{{ $product->nazov }}" class="product-image">
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

    </section>

    <!-- Oddelená sekcia pre pagináciu -->
    <section class="pagination-section">
        @if ($products->hasPages())
            <div class="pagination">
                @if ($products->onFirstPage())
                    <button class="disabled" aria-disabled="true">«</button>
                @else
                    <a href="{{ $products->previousPageUrl() }}" class="pagination-link">
                        <button>«</button>
                    </a>
                @endif

                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
                        <span class="page-number active-page">{{ $page }}</span>
                    @else
                        <a href="{{ $products->url($page) }}" class="pagination-link">
                            <span class="page-number">{{ $page }}</span>
                        </a>
                    @endif
                @endforeach

                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="pagination-link">
                        <button>»</button>
                    </a>
                @else
                    <button class="disabled" aria-disabled="true">»</button>
                @endif

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


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const minInput = document.getElementById('price_min');
    const maxInput = document.getElementById('price_max');
    const minLabel = document.getElementById('price-min-value');
    const maxLabel = document.getElementById('price-max-value');
    const rangeTrack = document.getElementById('range-track');

    const sliderMin = parseInt(minInput.min);
    const sliderMax = parseInt(minInput.max);

    function updateSlider() {
        let minval = parseInt(minInput.value);
        let maxval = parseInt(maxInput.value);

        // Fix na prekríženie
        if (minval > maxval) {
            [minval, maxval] = [maxval, minval];
        }

        minLabel.textContent = minval;
        maxLabel.textContent = maxval;

        const percentMin = ((minval - sliderMin) / (sliderMax - sliderMin)) * 100;
        const percentMax = ((maxval - sliderMin) / (sliderMax - sliderMin)) * 100;

        rangeTrack.style.left = percentMin + '%';
        rangeTrack.style.width = (percentMax - percentMin) + '%';
    }

    minInput.addEventListener('input', updateSlider);
    maxInput.addEventListener('input', updateSlider);

    updateSlider();
});

</script>
@endpush


@push('scripts')
<script>
document.getElementById('reset').addEventListener('click', function () {
    const form = document.querySelector('.filter-options');
    
    // Vyčistiť všetky inputy v rámci formulára
    form.querySelectorAll('input, select').forEach(el => {
        if (el.type === 'checkbox' || el.type === 'radio') {
            el.checked = false;
        } else if (el.type === 'range') {
            if (el.id === 'price_min') el.value = el.min;
            else if (el.id === 'price_max') el.value = el.max;
        } else {
            el.value = '';
        }
    });

    document.getElementById('price-min-value').textContent = document.getElementById('price_min').value;
    document.getElementById('price-max-value').textContent = document.getElementById('price_max').value;

    form.submit();
});
</script>
@endpush