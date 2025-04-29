@extends('layouts.app')

@section('title', "{{ $product->nazov }} - Keramo.sk")

@section('content')
    <!-- Detail produktu -->
    <section class="container">
        <div class="image-container">
            <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}">
        </div>
        <div class="info-container">
            <h2>{{ $product->nazov }}</h2>
            <p class="description">{{ $product->popis }}</p>
            <p class="price">Cena: {{ number_format($product->cena, 2) }}€</p>

            <div class="quantity">
                <label for="pocet">Počet kusov:</label>
                <form id="cart-form" action="{{ route('cart.add', ['slug' => $product->slug]) }}" method="POST">
                    @csrf
                    <select id="pocet" name="quantity">
                        <option value="1">1 ks</option>
                        <option value="2">2 ks</option>
                        <option value="3">3 ks</option>
                        <option value="4">4 ks</option>
                        <option value="5">5 ks</option>
                    </select>
                    <button type="submit" class="cart"><i class="fas fa-shopping-cart"></i> Pridať do košíka</button>
                </form>
            </div>

            <div class="detail-buttons">
                <!-- Favorite button (placeholder, requires additional logic) -->
                <form action="{{ route('favorites.add', ['slug' => $product->slug]) }}" method="POST">
                    @csrf
                    <button type="submit" class="favorite"><i class="fas fa-heart"></i> Pridať medzi obľúbené</button>
                </form>
            </div>

            <!-- Popup for cart confirmation -->
            @if (session('success'))
                <div class="cart-popup">
                    <div class="cart-popup-content">
                        <a href="{{ route('cups') }}" class="close-btn">×</a>
                        <h2>Produkt bol pridaný do košíka</h2>
                        <div class="cart-item-summary">
                            <img src="{{ asset($product->obrazok) }}" alt="{{ $product->nazov }}" class="cart-item-image">
                            <div class="cart-item-info">
                                <p class="cart-item-name">{{ $product->nazov }}</p>
                                <p class="cart-item-price">Cena: {{ number_format($product->cena, 2) }}€</p>
                                <p class="cart-item-quantity">Množstvo: {{ session('quantity', 1) }}</p>
                            </div>
                        </div>
                        <div class="cart-buttons">
                            <a href="{{ route('cart.index') }}" class="go-to-cart">Prejsť do košíka</a>
                            <a href="{{ route('cups') }}" class="continue-shopping">Pokračovať v nákupe</a>
                        </div>
                    </div>
                </div>
            @endif

            <a href="{{ route('cups') }}" class="back-btn">← Späť na poháre.</a>
        </div>
    </section>

    <!-- Detaily produktu -->
    <section class="product-details">
        <div class="detail-image">
            <img src="{{ asset($product->detail_obrazok ?? $product->obrazok) }}" alt="Detail {{ $product->nazov }}">
        </div>
        <div class="detail-info">
            <h3>Detaily produktu</h3>
            <ul>
                <li>{{ $product->detail_popis ?? $product->popis }}</li>
                <li><strong>Materiál:</strong> {{ $product->material ?? 'Keramika' }}</li>
                <li><strong>Rozmery hrnčeka:</strong> {{ $product->rozmer ?? 'Není uvedeno' }}</li>
                <li><strong>Objem:</strong> {{ $product->objem ?? 'Není uvedeno' }}</li>
                <li><strong>Povrchová úprava:</strong> {{ $product->povrchova_uprava ?? 'Glazúrovaný povrch' }}</li>
                <li><strong>Vhodné do umývačky:</strong> {{ $product->vhodne_do_umyvacky ? 'Áno' : 'Nie' }}</li>
                <li><strong>Vhodné do mikrovlnky:</strong> {{ $product->vhodne_do_mikrovlnky ? 'Áno' : 'Nie' }}</li>
            </ul>
        </div>
    </section>

    <!-- Recenzie -->
    <section>
        <div class="reviews">
            @forelse ($product->reviews ?? [] as $review)
                <div class="review">
                    <p><strong>{{ $review->user_name }}</strong> ({{ $review->rating }}/5)</p>
                    <p class="stars">{!! str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) !!}</p>
                    <p>{{ $review->comment }}</p>
                </div>
            @empty
                <p>Zatiaľ žiadne recenzie.</p>
            @endforelse
        </div>
    </section>

    <!-- Návrhy produktov -->
    <section class="suggestions">
        <h2 class="suggestions-heading">Mohlo by sa vám páčiť</h2>
        <div class="suggestions-container">
            @forelse ($suggestedProducts ?? [] as $suggested)
                <div class="suggestion-item">
                    <img src="{{ asset($suggested->obrazok) }}" alt="{{ $suggested->nazov }}">
                    <h3>{{ $suggested->nazov }}</h3>
                    <p>{{ $suggested->popis }}</p>
                    <p class="price">{{ number_format($suggested->cena, 2) }}€</p>
                </div>
            @empty
                <p>Žiadne odporúčané produkty.</p>
            @endforelse
        </div>
    </section>
@endsection