@extends('layouts.app')

@section('content')
<section class="products">
    <h2>Moje obľúbené</h2>

    @forelse($favorites as $product)
        <div class="product-item">
            <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}" class="product-image">
            </a>
            <h3>{{ $product->nazov }}</h3>
            <p>{{ $product->popis }}</p>
            <p class="price">{{ number_format($product->cena, 2) }}€</p>
        </div>
    @empty
        <p>Nemáte žiadne obľúbené produkty.</p>
    @endforelse
</section>
@endsection
