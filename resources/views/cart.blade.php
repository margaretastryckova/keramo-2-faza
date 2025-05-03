@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="checkout-steps">
        <span class="step active">Košík</span> <span class="step-separator">→</span>
        <span class="step inactive">Pokladňa</span> <span class="step-separator">→</span>
        <span class="step inactive">Potvrdenie objednávky</span>
    </div>

    <section class="cart-container">
        <div class="cart-items">
            @php
                $cart = session('cart', []);
                $total = 0;
            @endphp

            @forelse($cart as $item)
                @php
                    $subtotal = $item['cena'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="cart-item">
                    <!-- Tlačidlo zmazania -->
                    <button class="remove-btn" onclick="openDeletePopup({{ $item['id'] }})">&times;</button>

                    <img src="{{ asset($item['obrazok']) }}" alt="{{ $item['nazov'] }}">
                    <div class="cart-details">
                        <h3>{{ $item['nazov'] }}</h3>
                        <div class="cart-info">
                            <form method="POST" action="{{ route('cart.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">

                                <div class="cart-column">
                                    <span class="cart-label">Cena:</span>
                                    <span class="price">{{ number_format($item['cena'], 2) }}€</span>
                                </div>

                                <div class="cart-column">
                                    <span class="cart-label">Množstvo:</span>
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="quantity-input">
                                    <button type="submit" class="update-btn">Uložiť</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Popup na zmazanie -->
                    <div id="delete-popup-{{ $item['id'] }}" class="delete_popup" style="display: none;">
                        <div class="delete_popup_content">
                            <p>Naozaj chcete vymazať tento produkt z košíka?</p>
                            <div class="delete_popup_buttons">
                                <button onclick="closeDeletePopup({{ $item['id'] }})" class="cancel-btn">Nie</button>
                                <form method="POST" action="{{ route('cart.remove') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item['id'] }}">
                                    <button type="submit" class="confirm-delete">Áno</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            @empty
                <p>Košík je prázdny.</p>
            @endforelse
        </div>

        <div class="cart-summary">
            <h3>Medzisúčet: <span class="total-price">{{ number_format($total, 2) }}€</span></h3>
            <p>Doprava bude vypočítaná pri pokladni.</p>
            <div class="kosik-buttons">
                <a href="{{ url()->previous() }}" class="continue-shopping">← Pokračovať v nákupe</a>
                <a href="{{ route('checkoutt') }}" class="checkout-btn">Pokračovať k pokladni</a>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
    function openDeletePopup(id) {
        document.getElementById('delete-popup-' + id).style.display = 'block';
    }

    function closeDeletePopup(id) {
        document.getElementById('delete-popup-' + id).style.display = 'none';
    }
</script>
@endpush
