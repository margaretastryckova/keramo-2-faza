@extends('layouts.app')

@section('title', 'Vyhľadávanie - Keramo.sk')

@section('content')
<section class="products">
    <h2>Výsledky vyhľadávania pre "{{ $query }}"</h2>
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


    @if ($products->isEmpty())
        <p>Žiadne produkty neboli nájdené.</p>
    @else
        @foreach ($products as $product)
            <div class="product-item">
                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                    <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}" class="product-image">
                </a>
                <h3>{{ $product->nazov }}</h3>
                <p>{{ $product->popis }}</p>


                <p class="price">{{ number_format($product->cena, 2) }}€</p>
                <input type="checkbox" id="f{{ $product->id }}" class="favorite-checkbox">
                <label for="f{{ $product->id }}" class="heart-icon">
                    <i class="fas fa-heart"></i>
                </label>
            </div>
        @endforeach
    @endif

</section>

<div class="pagination">
    {{ $products->appends(request()->query())->links() }}
</div>
@endsection
