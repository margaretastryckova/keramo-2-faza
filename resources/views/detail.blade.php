@extends('layouts.app')

@section('title', '{{ $product->nazov }} - Keramo.sk')

@section('content')
<section class="product-detail">
    <h1>{{ $product->nazov }}</h1>
    <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}" class="product-image">
    <p>{{ $product->popis }}</p>
    <p><strong>Cena:</strong> {{ number_format($product->cena, 2) }}€</p>
    <p><strong>Objem:</strong> {{ $product->objem }}</p>
    <p><strong>Rozmer:</strong> {{ $product->rozmer }}</p>
    <form action="{{ route('cart.add', ['slug' => $product->slug]) }}" method="POST">
        @csrf
        <button type="submit" class="btn-primary">Pridať do košíka</button>
    </form>
</section>
@endsection