@extends('layouts.app')

@section('content')
<div class="wrapper">

    <!-- profil -->
    <div class="profile-menu-container">
        <h2>Ahoj, Emil!</h2>
        <ul>
            <li>
                <label for="profile-toggle">
                    Môj profil <span class="toggle-icon">+</span>
                </label>
                <input type="checkbox" id="profile-toggle" class="toggle-input">
                <div class="dropdown-content">
                    <a href="#">Zmeniť profilovú fotku</a>
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
                    <a href="#">Zobraziť všetky objednávky</a>
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
            <li><a href="{{ url('/profil') }}">Odhlásiť sa</a></li>
        </ul>
    </div> 
</div>
@endsection
