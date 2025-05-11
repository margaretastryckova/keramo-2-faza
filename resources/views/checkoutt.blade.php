@extends('layouts.app')

@section('content')

<div class="checkout-steps">
    <span class="step inactive">Košík</span> <span class="step-separator">→</span>
    <span class="step active">Pokladňa</span> <span class="step-separator">→</span>
    <span class="step inactive">Potvrdenie objednávky</span>
</div>

<form method="POST" action="{{ route('checkout.store') }}" id="checkout-form" novalidate>
    @csrf
    <div class="checkout-container">
        <!-- Osobne udaje -->
        <div class="checkout-column">
            <div class="check-header-container">
                <h2>Kontaktné údaje</h2>
                @php
                    $nameParts = Auth::check() ? explode(' ', Auth::user()->name, 2) : ['', ''];
                    $meno = $nameParts[0] ?? '';
                    $priezvisko = $nameParts[1] ?? '';
                @endphp

                @guest
                    <a href="{{ route('login') }}" class="login-link">prihlásiť sa</a>
                @else
                    <span>Prihlásený ako: {{ $meno }}</span>
                @endguest
            </div>
            <div class="form-group">
                <label for="email">E-mail <span class="required-star">*</span></label>
                <input type="email" id="email" name="email" placeholder="email@gmail.com" value="{{ old('email', Auth::check() ? Auth::user()->email : '') }}" required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <h2>Adresa doručenia a osobné údaje</h2>
            <div class="form-group">
                <label for="meno">Meno <span class="required-star">*</span></label>
                <input type="text" id="meno" name="meno" placeholder="Meno" value="{{ old('meno', $meno) }}" required>
                @error('meno')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <label for="priezvisko">Priezvisko <span class="required-star">*</span></label>
                <input type="text" id="priezvisko" name="priezvisko" placeholder="Priezvisko" value="{{ old('priezvisko', $priezvisko) }}" required>
                @error('priezvisko')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="firma">Firma (nepovinné)</label>
                <input type="text" id="firma" name="firma" placeholder="Firma (nepovinné)" value="{{ old('firma') }}">
                @error('firma')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ulica">Ulica a číslo ulice <span class="required-star">*</span></label>
                <input type="text" id="ulica" name="ulica" placeholder="Ulica a číslo ulice" value="{{ old('ulica') }}" required>
                @error('ulica')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="mesto">Mesto <span class="required-star">*</span></label>
                <input type="text" id="mesto" name="mesto" placeholder="Mesto" value="{{ old('mesto') }}" required>
                @error('mesto')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <label for="psc">PSČ <span class="required-star">*</span></label>
                <input type="text" id="psc" name="psc" placeholder="PSČ" value="{{ old('psc') }}" required>
                @error('psc')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <label for="krajina">Krajina <span class="required-star">*</span></label>
                <select id="krajina" name="krajina" required>
                    <option value="Slovensko" {{ old('krajina') == 'Slovensko' ? 'selected' : '' }}>Slovensko</option>
                    <option value="Česko" {{ old('krajina') == 'Česko' ? 'selected' : '' }}>Česko</option>
                </select>

            </div>
            <div class="form-group">
                <label for="predvolba">Predvoľba</label>
                <input type="text" id="predvolba" name="predvolba" placeholder="+421" value="{{ old('predvolba', '+421') }}">
                @error('predvolba')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <label for="telefon">Telefónne číslo <span class="required-star">*</span></label>
                <input type="text" id="telefon" name="telefon" placeholder="Telefónne číslo (000000000)" value="{{ old('telefon') }}" required>
                @error('telefon')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Platba a dorucenie -->
        <div class="checkout-column right">
            <div class="doprava-header-container">
                <h2>Spôsob doručenia <span class="required-star">*</span></h2>
                <a href="#" class="text-o-doprave">Doprava do 7-10 pracovných dní</a>
            </div>
            <div class="delivery-options">
                <label><input type="radio" name="delivery" value="kurier" {{ old('delivery') == 'kurier' ? 'checked' : '' }} required> Kuriér</label>
                <label><input type="radio" name="delivery" value="odberne" {{ old('delivery') == 'odberne' ? 'checked' : '' }}> Odberné miesto</label>
                <label><input type="radio" name="delivery" value="osobny" {{ old('delivery') == 'osobny' ? 'checked' : '' }}> Osobný odber</label>
                @error('delivery')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <h2>Spôsob platby <span class="required-star">*</span></h2>
            <div class="payment-options">
                <label><input type="radio" name="payment" value="card" {{ old('payment') == 'card' ? 'checked' : '' }} required> Platobná karta</label>
                <label><input type="radio" name="payment" value="dobierka" {{ old('payment') == 'dobierka' ? 'checked' : '' }}> Dobierka</label>
                <label><input type="radio" name="payment" value="paypal" {{ old('payment') == 'paypal' ? 'checked' : '' }}> PayPal</label>
                @error('payment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">Zapamätať si ma pre ďalšie nákupy</label>
            </div>

            <button type="submit" class="btn-primary">Dokončiť objednávku</button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const krajinaSelect = document.getElementById('krajina');
    const predvolbaInput = document.getElementById('predvolba');

    function updatePrefix() {
        const selectedCountry = krajinaSelect.value;
        if (selectedCountry === 'Slovensko') {
            predvolbaInput.value = '+421';
        } else if (selectedCountry === 'Česko') {
            predvolbaInput.value = '+420';
        }
    }

    // Spustí sa pri načítaní stránky 
    updatePrefix();

    // Spustí sa vždy, keď sa zmení krajina
    krajinaSelect.addEventListener('change', updatePrefix);
});
</script>



<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('checkout-form');

    // Automatické odstránenie chyby po úprave poľa
    form.querySelectorAll('input, select').forEach(field => {
        field.addEventListener('input', function () {
            if (field.value.trim() !== '') {
                field.classList.remove('error');

                // Odstráni aj hlášku pod poľom
                const errorSpan = field.nextElementSibling;
                if (errorSpan && errorSpan.classList.contains('text-danger')) {
                    errorSpan.style.display = 'none';
                }
            }
        });
    });

    form.addEventListener('submit', function (event) {
        let isValid = true;

        form.querySelectorAll('[required]').forEach(field => {
            const value = field.value.trim();
            if (!value) {
                field.classList.add('error');
                isValid = false;
            }
        });

        // Validácia pre radio buttons
        const delivery = form.querySelector('input[name="delivery"]:checked');
        const payment = form.querySelector('input[name="payment"]:checked');

        const deliveryContainer = form.querySelector('.delivery-options');
        const paymentContainer = form.querySelector('.payment-options');

        deliveryContainer.classList.remove('error');
        paymentContainer.classList.remove('error');

        if (!delivery) {
            deliveryContainer.classList.add('error');
            isValid = false;
        }

        if (!payment) {
            paymentContainer.classList.add('error');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault();
            alert('Prosím, vyplňte všetky povinné polia označené hviezdičkou (*).');
        }
    });
});
</script>
@endsection