@extends('layouts.app')

@section('title', 'Vyhľadávanie - Keramo.sk')

@section('content')
<section class="products">
    <h2>Výsledky vyhľadávania pre "{{ $query }}"</h2>

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

                @if ($product->farba)
                    <p>Farba: {{ $product->farba }}</p> <!-- Zobrazenie farby, ak existuje -->
                @endif

                <p class="price">{{ number_format($product->cena, 2) }}€</p>
                <input type="checkbox" id="f{{ $product->id }}" class="favorite-checkbox">
                <label for="f{{ $product->id }}" class="heart-icon">
                    <i class="fas fa-heart"></i>
                </label>
            </div>
        @endforeach
    @endif

    <div class="pagination">
        {{ $products->appends(request()->query())->links() }}
    </div>
</section>
@endsection
