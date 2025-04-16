@extends('layouts.app')

@section('title', 'Detail - Keramo.sk')

@section('content')
<section class="container">
        <div class="image-container">
                <img src="{{ asset($produkt['obrazok']) }}" alt="{{ $produkt['nazov'] }}">        </div>
            <div class="info-container">
                <h2>{{ $produkt['nazov'] }}</h2>
                <p class="description">{{ $produkt['popis'] }}</p>
                <p class="price">Cena: {{ $produkt['cena'] }}</p>
                        
                <div class="quantity">
                    <label for="pocet">Počet kusov:</label>
                    <select id="pocet">
                        <option value="1">1 ks</option>
                        <option value="2">2 ks</option>
                        <option value="3">3 ks</option>
                        <option value="4">4 ks</option>
                        <option value="5">5 ks</option>
                    </select>
                </div>
        
                <div class="detail-buttons">
                    <!-- Skrytý checkbox na ovládanie popupu -->
                    <input type="checkbox" id="cart-popup-toggle" class="cart-popup-toggle">
                    
                    <a href="#cart-popup" class="cart"><i class="fas fa-shopping-cart"></i> Pridať do košíka</a>

                    <!-- Popup -->
                    <div id="cart-popup" class="cart-popup">
                        <div class="cart-popup-content">

                            <a href="#" class="close-btn">×</a>

                            <h2>Produkt bol pridaný do košíka</h2>
                            <div class="cart-item-summary">
                                <img src="pohare/modry_pohar.jpg" alt="Modrý glazúrovaný pohár" class="cart-item-image">
                                <div class="cart-item-info">
                                    <p class="cart-item-name">Keramický pohár s modrou glazúrou</p>
                                    <p class="cart-item-price">Cena: 15,00€</p>
                                    <p class="cart-item-quantity">Množstvo: 1</p>
                                </div>
                            </div>
                            <div class="cart-buttons">
                                <a href="kosik.html" class="go-to-cart">Prejsť do košíka</a>
                                <a href="#" class="continue-shopping">Pokračovať v nákupe</a>
                            </div>
                        </div>
                    </div>

                    <button class="favorite"><i class="fas fa-heart"></i> Pridať medzi obľúbené</button>            
                </div>
                
                <!-- POPUP Košík -->
                <div class="cart-popup">
                    <div class="cart-popup-content">
                        <!-- Label na zatvorenie popupu -->
                        <label for="cart-popup-toggle" class="close-btn">×</label>
                        
                        <h2>Produkt bol pridaný do košíka</h2>
                        <div class="cart-item-summary">
                            <img src="pohare/modry_pohar.jpg" alt="Modrý glazúrovaný pohár" class="cart-item-image">
                            <div class="cart-item-info">
                                <p class="cart-item-name">Keramický pohár s modrou glazúrou</p>
                                <p class="cart-item-price">Cena: 15,00€</p>
                                <p class="cart-item-quantity">Množstvo: 1</p>
                            </div>
                        </div>
                        <div class="cart-buttons">
                            <a href="kosik.html" class="go-to-cart">Prejsť do košíka</a>
                            <a href="pohare.html" class="continue-shopping">Pokračovať v nákupe</a>
                        </div>
                    </div>
                </div>
                
        
                <a href="pohare.html" class="back-btn">← Späť na pohare.</a>
            </div>
        
    </section>

    

    <!-- detailiky produktu -->
    <section class="product-details">
        <div class="detail-image">
            <img src="pohare/detail modreho pohara.jpg" alt="Detail modrého pohárika">
        </div>
        <div class="detail-info">
            <h3>Detaily produktu</h3>
            <ul>
                <li>
                    Tento malý keramický hrnček je ideálnou voľbou pre tých, ktorí preferujú menšie porcie kávy či čaju,
                    pričom si zachováva schopnosť udržať nápoj teplý bez potreby častého dolievania. 
                    Hrnček je perfektný na pomalé vychutnávanie nápoja. Súčasťou sady je aj tanierik, ktorý skvele 
                    dopĺňa hrnček. Hrnček je navrhnutý tak, aby ho mohol používať každý, kto prejde vašou kuchyňou a je úplne bezpečný na použitie.</li>
                <li><strong>Materiál:</strong> Keramika</li>
                <li><strong>Rozmery hrnčeka:</strong> malý</li>
                <li><strong>Objem:</strong> 200 ml</li>
                <li><strong>Povrchová úprava:</strong> Glazúrovaný povrch</li>
                <li><strong>Vhodné do umývačky:</strong> Áno</li>
                <li><strong>Vhodné do mikrovlnky:</strong> Áno</li>
            </ul>
        </div>
    </section>
    <section>
        <!-- recenzie -->
        <div class="reviews">
            <div class="review">
                <p><strong>Peter</strong> (5/5)</p>
                <p class="stars">★★★★★</p>
                <p>Výborná kvalita, presne to čo som hľadala. Určite odporúčam!!!</p>
            </div>
            <div class="review">
                <p><strong>Maria</strong> (5/5)</p>
                <p class="stars">★★★★★</p>
                <p>Milujem tento pohár s tanierikom. Výborne sa z neho pije a určite to nebola moja posledná objednávka.</p>
            </div>
            <div class="review">
                <p><strong>Klára</strong> (4/5)</p>
                <p class="stars">★★★★☆</p>
                <p>Akurát veľkosť na rannú kávičku! Vysoká spokojnosť. </p>
            </div>
        </div>
    </section>

    <!-- narhovane -->
    <section class="suggestions">
        <h2 class="suggestions-heading">Mohlo by sa vám páčiť</h2>
        <div class="suggestions-container">
            <div class="suggestion-item">
                <img src="pohare/pinch-pot-mug-1024x536.jpeg" alt="Minimalistické poháre">
                <h3>Minimalistické poháre</h3>
                <p>Minimalistické, originálne poháre strednej veľkosti. </p>
                <p class="price">40,00€</p>
            </div>
            <div class="suggestion-item">
                <img src="pohare/cute_pohar.jpg" alt="Krásny kvetinový hrnček s tanierikom">
                <h3>Krásny kvetinový hrnček s tanierikom</h3>
                <p>Kvalitná ručná práca a ručne zdobený.</p>
                <p class="price">23,00€</p>
            </div>
            <div class="suggestion-item">
                <img src="pohare/asymetricky_pohar.jpg" alt="Asymetrický pohár">
                <h3>Asymetrický pohár </h3>
                <p>Originálny dizajn, ktorý poteší každého milovníka pohárov.</p>
                <p class="price">20,00€</p>
            </div>
        </div>
    </section>

<div class="pagination">
    <button>&laquo;</button>
    <span class="page-number active-page">1</span>
    <span class="page-number">2</span>
    <span class="page-number">3</span>
    <span class="dots">...</span>
    <span class="page-number">10</span>
    <button>&raquo;</button>
</div>
@endsection