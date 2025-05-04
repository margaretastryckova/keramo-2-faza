@extends('layouts.app')

@section('content')
<div class="wrapper">
    <!-- profil -->
    <div class="profile-menu-container">
        <h2>Ahoj, {{ Auth::user()->name }}!</h2>
        <ul>
            <li>
                <label for="profile-toggle">
                    Môj profil <span class="toggle-icon">+</span>
                </label>
                <input type="checkbox" id="profile-toggle" class="toggle-input">
                <div class="dropdown-content">
                    <a href="#">Zmeniť heslo</a>
                    <a href="#">Vybrať jazyk</a>
                    <a href="#">Vybrať krajinu</a>
                    <a href="#">Zmeniť emailovú adresu</a>
                </div>
            </li>

            <li>
                <label for="settings-toggle">
                    Nastavenia <span class="toggle-icon">+</span>
                </label>
                <input type="checkbox" id="settings-toggle" class="toggle-input">
                <div class="dropdown-content">
                    <a href="#">Zmeniť profilové údaje</a>
                    <a href="#">Zmeniť preferencie</a>
                </div>
            </li>

            <li>
                <label for="orders-toggle">
                    Moje objednávky <span class="toggle-icon">+</span>
                </label>
                <input type="checkbox" id="orders-toggle" class="toggle-input">
                <div class="dropdown-content">
                <a href="{{ route('orders.index') }}">Zobraziť všetky objednávky</a>
                <a href="#">Sledovať objednávku</a>
                    <a href="#">Prijaté objednávky</a>
                </div>
            </li>

            <li>
                <label for="favorites-toggle">
                    Moje obľúbené <span class="toggle-icon">+</span>
                </label>
                <input type="checkbox" id="favorites-toggle" class="toggle-input">
                <div class="dropdown-content">
                    <a href="#">Zobraziť obľúbené produkty</a>
                    <a href="#">Pridať nový produkt</a>
                </div>
            </li>

            <!-- Odhlásenie -->
            <li>
                <a href="{{ route('logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Odhlásiť sa
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div> 
</div>
@endsection