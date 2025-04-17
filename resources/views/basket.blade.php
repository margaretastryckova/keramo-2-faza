@extends('layouts.app')

@section('content')
<div class="wrapper">

    <!-- postup -->
    <div class="checkout-steps">
        <span class="step active">Košík</span> <span class="step-separator">→</span>
        <span class="step inactive">Pokladňa</span> <span class="step-separator">→</span>
        <span class="step inactive">Potvrdenie objednávky</span>
    </div>

    <!-- Obsah kosika -->
    <section class="cart-container">
        <div class="cart-items">

            <div class="cart-item">
                <input type="checkbox" id="delete1" class="delete-toggle">
                <label for="delete1" class="remove-btn">&times;</label>
                <img src="{{ asset('pohare/modry_pohar.jpg') }}" alt="Vintage tanier">
                <div class="cart-details">
                    <h3>Keramický pohár s modrou glazúrou</h3>
                    <div class="cart-info">
                        <div class="cart-column">
                            <span class="cart-label">Cena:</span>
                            <span class="price">15,00€</span>
                        </div>
                        <div class="cart-column">
                            <span class="cart-label">Množstvo:</span>
                            <input type="number" id="quantity2" min="1" value="1" class="quantity-input">
                        </div>
                    </div>
                </div>
                <div class="delete_popup">
                    <div class="delete_popup_content">
                        <p>Naozaj chcete vymazať tento produkt z košíka?</p>
                        <div class="delete_popup_buttons">
                            <label for="delete1" class="cancel-btn">Nie</label>
                            <button class="confirm-delete">Áno</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-item">
                <input type="checkbox" id="delete2" class="delete-toggle">
                <label for="delete2" class="remove-btn">&times;</label>
                <img src="{{ asset('taniere/jahodovy.jpg') }}" alt="Jahodový tanier">
                <div class="cart-details">
                    <h3>Jahodový tanier</h3>
                    <div class="cart-info">
                        <div class="cart-column">
                            <span class="cart-label">Cena:</span>
                            <span class="price">20,00€</span>
                        </div>
                        <div class="cart-column">
                            <span class="cart-label">Množstvo:</span>
                            <input type="number" id="quantity1" min="1" value="1" class="quantity-input">
                        </div>
                    </div>
                </div>
            </div>

            <div class="cart-item">
                <input type="checkbox" id="delete3" class="delete-toggle">
                <label for="delete3" class="remove-btn">&times;</label>
                <img src="{{ asset('taniere/starosvecky.jpg') }}" alt="Vintage tanier">
                <div class="cart-details">
                    <h3>Vintage tanier</h3>
                    <div class="cart-info">
                        <div class="cart-column">
                            <span class="cart-label">Cena:</span>
                            <span class="price">10,00€</span>
                        </div>
                        <div class="cart-column">
                            <span class="cart-label">Množstvo:</span>
                            <input type="number" id="quantity3" min="1" value="1" class="quantity-input">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- zhrnutie objednavky -->
        <div class="cart-summary">
            <h3>Medzisúčet: <span class="total-price">45,00€</span></h3>
            <p>Doprava bude vypočítaná pri pokladni.</p>
            <div class="kosik-buttons">
                <a href="{{ url('/eshop') }}" class="continue-shopping">← Pokračovať v nákupe</a>
                <a href="{{ url('/checkout') }}" class="checkout-btn">Pokračovať k pokladni</a>
            </div>
        </div>
    </section>
</div>
@endsection
