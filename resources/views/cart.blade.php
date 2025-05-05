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
                use App\Models\CartItem;
                use Illuminate\Support\Facades\Auth;

                if (Auth::check()) {
                    $cartItems = CartItem::with('product')->where('user_id', Auth::id())->get()->map(function ($item) {
                        return [
                            'id' => $item->product_id,
                            'nazov' => $item->product->nazov,
                            'cena' => $item->product->cena,
                            'obrazok' => $item->product->obrazok,
                            'quantity' => $item->quantity
                        ];
                    });
                } else {
                    $cartItems = collect(session('cart', []));
                }

                $total = $cartItems->sum(fn($item) => $item['cena'] * $item['quantity']);
            @endphp

            @forelse($cartItems as $item)
                @php $subtotal = $item['cena'] * $item['quantity']; @endphp

                <div class="cart-item">
                    <button class="remove-btn" onclick="openDeletePopup({{ $item['id'] }})">&times;</button>
                    <img src="{{ asset($item['obrazok']) }}" alt="{{ $item['nazov'] }}">
                    <div class="cart-details">
                        <h3>{{ $item['nazov'] }}</h3>
                        <div class="cart-info">
                            <div class="cart-column">
                                <span class="cart-label">Cena spolu:</span>
                                <span class="price price-total" data-id="{{ $item['id'] }}">
                                    <strong>{{ number_format($subtotal, 2) }}€</strong>
                                </span>
                            </div>

                            <div class="cart-column">
                                <span class="cart-label">Množstvo:</span>
                                <input type="number"
                                       class="quantity-input"
                                       data-id="{{ $item['id'] }}"
                                       data-unit-price="{{ $item['cena'] }}"
                                       min="1"
                                       value="{{ $item['quantity'] }}">
                            </div>
                        </div>
                    </div>

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
                <a href="{{ route('home') }}#kategorie" class="continue-shopping">← Pokračovať v nákupe</a>
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

    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.quantity-input').forEach(function(input) {
            input.addEventListener('input', function () {
                const id = this.getAttribute('data-id');
                const unitPrice = parseFloat(this.getAttribute('data-unit-price'));
                const quantity = parseInt(this.value) || 1;

                const priceSpan = document.querySelector(`.price-total[data-id="${id}"]`);
                const newTotal = (unitPrice * quantity).toFixed(2);
                priceSpan.innerHTML = `<strong>${newTotal}€</strong>`;

                fetch("{{ route('cart.update') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ id: id, quantity: quantity })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.new_total !== undefined) {
                        document.querySelector('.total-price').textContent = data.new_total.toFixed(2) + '€';
                    }
                })
                .catch(err => console.error('Chyba pri ukladaní množstva:', err));
            });
        });
    });
</script>
@endpush
