@extends('layouts.app')

@section('content')
<div class="checkout-steps">
    <span class="step inactive">Košík</span> <span class="step-separator">→</span>
    <span class="step active">Pokladňa</span> <span class="step-separator">→</span>
    <span class="step inactive">Potvrdenie objednávky</span>
</div>

<div class="checkout-container">
    <!-- Osobne udaje -->
    <div class="checkout-column">
        <div class="check-header-container">
            <h2>Kontaktné údaje</h2>
            <a href="{{ url('/profil') }}" class="login-link">prihlásiť sa</a>
        </div>
        <div class="form-group">
            <input type="email" id="email" placeholder="email@gmail.com">
        </div>
        <h2>Adresa doručenia a osobné údaje</h2>
        <div class="form-group">
            <input type="text" placeholder="Meno">
            <input type="text" placeholder="Priezvisko">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Firma (nepovinné)">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Ulica a číslo ulice">
        </div>
        <div class="form-group">
            <input type="text" placeholder="Mesto">
            <input type="text" placeholder="PSČ">
            <select>
                <option>Slovensko</option>
                <option>Česko</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" placeholder="+421">
            <input type="text" placeholder="Telefónne číslo (000000000)">
        </div>
    </div>

    <!-- Platba a dorucenie -->
    <div class="checkout-column right">
        <div class="doprava-header-container">
            <h2>Spôsob doručenia</h2>
            <a href="#" class="text-o-doprave">Doprava do 7-10 pracovných dní</a>
        </div>
        <div class="delivery-options">
            <label><input type="radio" name="delivery" value="kurier"> Kuriér</label>
            <label><input type="radio" name="delivery" value="odberne"> Odberné miesto</label>
            <label><input type="radio" name="delivery" value="osobny"> Osobný odber</label>
        </div>

        <h2>Spôsob platby</h2>
        <div class="payment-options">
            <label><input type="radio" name="payment" value="card"> Platobná karta</label>
            <label><input type="radio" name="payment" value="dobierka"> Dobierka</label>
            <label><input type="radio" name="payment" value="paypal"> PayPal</label>
        </div>

        <div class="remember-me">
            <input type="checkbox" id="remember">
            <label for="remember">Zapamätať si ma pre ďalšie nákupy</label>
        </div>

        <a href="{{ url('/confirmation') }}" class="btn-primary">Dokončiť objednávku</a>
    </div>
</div>
@endsection
