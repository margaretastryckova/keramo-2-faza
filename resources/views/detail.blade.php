@extends('layouts.app')

@section('title', "{{ $product->nazov }} - Keramo.sk")

@section('content')
    @if(session('cart_popup'))
    <div class="cart-popup" style="right: 0;">
        <div class="cart-popup-content">
            <a href="{{ route('cups') }}" class="close-btn">×</a>
            <h2>Produkt bol pridaný do košíka</h2>
            <div class="cart-item-summary">
            @php $popup = session('cart_popup'); @endphp

            <img src="{{ asset($popup['obrazok']) }}" alt="{{ $popup['nazov'] }}" class="cart-item-image">
            <div class="cart-item-info">
                <p class="cart-item-name">{{ $popup['nazov'] }}</p>
                <p class="cart-item-price">Cena: {{ number_format($popup['cena'], 2) }}€</p>
                <p class="cart-item-quantity">Množstvo: {{ $popup['quantity'] }}</p>
            </div>

  
                
            </div>
            <div class="cart-buttons">
                <a href="{{ route('cart.index') }}" class="go-to-cart">Prejsť do košíka</a>
                <a href="{{ url()->previous() }}" class="continue-shopping">Pokračovať v nákupe</a>
            </div>
        </div>
    </div>
    @endif

    <!-- Detail produktu -->
    <section class="container">
        <div class="image-container">
            @php
                $imagePath = strpos($product->obrazok, 'products/') === 0
                    ? asset('storage/' . $product->obrazok)
                    : asset($product->obrazok);
                $detailPath = strpos($product->detail, 'products/') === 0
                    ? asset('storage/' . $product->detail)
                    : asset($product->detail);
            @endphp

            <img src="{{ $imagePath }}" alt="{{ $product->nazov }}" class="product-image">   
        </div>     
        <div class="info-container">
            <h2>{{ $product->nazov }}</h2>
            <p class="description">{{ $product->popis }}</p>
            <p class="price">Cena: <span id="price-display">{{ number_format($product->cena, 2) }}</span>€</p>

            
            <div class="detail-purchase-box">
                <form id="cart-form" action="{{ route('cart.add', ['slug' => $product->slug]) }}" method="POST">
                    @csrf
                    <div class="cart-column">
                        <span class="cart-label">Množstvo:</span>
                        <input type="number" id="quantity1" name="quantity" min="1" value="1" class="quantity-input">
                    </div>
                    <button type="submit" class="cart"><i class="fas fa-shopping-cart"></i> Pridať do košíka</button>
                </form>

                <form method="POST" class="favorite-form">
                    @csrf
                    <button type="button"
                        class="favorite favorite-button-detail"
                        data-slug="{{ $product->slug }}"
                        data-initial-favorited="{{ $isFavorited ? 'true' : 'false' }}">
                        <i class="fas fa-heart"></i>
                        {{ $isFavorited ? 'Odstrániť z obľúbených' : 'Pridať medzi obľúbené' }}
                    </button>
                </form>
                <a href="{{ route('cups') }}" class="back-btn">← Späť na poháre.</a>

            </div>
        


            <!-- Popup na kosik -->
            @if (session('success'))
                <div class="cart-popup">
                    <div class="cart-popup-content">
                        <a href="{{ route('cups') }}" class="close-btn">×</a>
                        <h2>Produkt bol pridaný do košíka</h2>
                        <div class="cart-item-summary">
                            <img src="{{ asset('storage/' . $product->obrazok) }}" alt="Hlavný obrázok" style="max-height: 200px;">                            <div class="cart-item-info">
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

        </div>
    </section>

    <!-- Detaily produktu -->
    <section class="product-details">
        <div class="detail-image">
            <img src="{{ $detailPath }}" alt="{{ $product->nazov }}" class="product-image">        
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
                @php
                    $imagePath = strpos($suggested->obrazok, 'products/') === 0
                        ? asset('storage/' . $suggested->obrazok)
                        : asset($suggested->obrazok);
                @endphp

                <a href="{{ route('product.detail', ['slug' => $suggested->slug]) }}" class="suggestion-item">
                    <img src="{{ $imagePath }}" alt="{{ $suggested->nazov }}">
                    <h3>{{ $suggested->nazov }}</h3>
                    <p>{{ $suggested->popis }}</p>
                    <p class="price">{{ number_format($suggested->cena, 2) }}€</p>
                </a>
            @empty
                <p>Žiadne odporúčané produkty.</p>
            @endforelse
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // prepocet ceny podla mnozstva 
        const quantityInput = document.getElementById('quantity1');
        const priceDisplay = document.getElementById('price-display');
        const unitPrice = {{ $product->cena }};

        if (quantityInput && priceDisplay) {
            quantityInput.addEventListener('input', function () {
                const quantity = parseInt(quantityInput.value) || 1;
                const total = (unitPrice * quantity).toFixed(2);
                priceDisplay.textContent = total;
            });
        }

        // obľúbené tlačidlo na detaile
        const detailButton = document.querySelector('.favorite-button-detail');
        if (detailButton) {
            const isInitiallyFavorited = detailButton.getAttribute('data-initial-favorited') === 'true';

            if (isInitiallyFavorited) {
                detailButton.innerHTML = '<i class="fas fa-heart"></i> Odstrániť z obľúbených';
            } else {
                detailButton.innerHTML = '<i class="fas fa-heart"></i> Pridať medzi obľúbené';
            }

            detailButton.addEventListener('click', function(e) {
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
                        detailButton.innerHTML = '<i class="fas fa-heart"></i> Odstrániť z obľúbených';
                    } else {
                        detailButton.innerHTML = '<i class="fas fa-heart"></i> Pridať medzi obľúbené';
                    }
                })
                .catch(error => console.error('Chyba pri úprave obľúbených:', error));
            });
        }
    });
</script>
@endpush
