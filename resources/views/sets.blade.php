@extends('layouts.app')

@section('title', 'Sety - Keramo.sk')

@section('content')

<section class="products">
        <h2>Sety</h2>
        <div class="filter-container">
            <input type="checkbox" id="filter-toggle" class="filter-checkbox">
            
            <label for="filter-toggle" class="filter-button">
                <i class="fas fa-filter"></i> Filtrovať
            </label>
        
            <!-- filter -->
            <div class="filter-options">
                <div class="price-section">
                    <label>Cena:</label>
                    <input type="range" id="price_range" name="od" min="0" max="500" value="100" step="1" class="price_range">
                    <div class="price-range-values">
                        <span id="price-min">0</span> - <span id="price-max">500</span>
                    </div>
                </div>
        
                <div class="filter-section">
                    <label>Farba:</label>
                    <div class="color-options">
                        <label>
                            <input type="radio" name="color" value="biela">
                            <span class="color-box" style="background-color: white;"></span> Biela
                        </label>
                        <label>
                            <input type="radio" name="color" value="modra">
                            <span class="color-box" style="background-color: blue;"></span> Modrá
                        </label>
                        <label>
                            <input type="radio" name="color" value="cervena">
                            <span class="color-box" style="background-color: red;"></span> Červená
                        </label>
                        <label>
                            <input type="radio" name="color" value="zelena">
                            <span class="color-box" style="background-color: green;"></span> Zelená
                        </label>
                    </div>
                </div>
        
                <div class="filter-section">
                    <label>Rozmery:</label>
                    <label><input type="radio" name="size" value="male"> Malé</label>
                    <label><input type="radio" name="size" value="stredne"> Stredné</label>
                    <label><input type="radio" name="size" value="velke"> Veľké</label>
                </div>
            </div>
        </div>

        <div class="sort-container">
            <input type="checkbox" id="sort-toggle" class="sort-checkbox">
            <label for="sort-toggle" class="sort-button">
                <i class="fas fa-sort"></i> Triediť podľa
            </label>
            <div class="sort-options">
                <label><input type="radio" name="sort" value="najlacnejsie"> Najlacnejšie</label>
                <label><input type="radio" name="sort" value="najdrahsie"> Najdrahšie</label>
                <label><input type="radio" name="sort" value="najnovsie"> Najnovšie</label>
                <label><input type="radio" name="sort" value="najoblubenejsie"> Najobľúbenejšie</label>
            </div>
                
        </div>

        
        <div class="product-item">
            <a href="detail.html"> 
                <img src="setiky/vzorovany_vintage.jpg" alt="Vintage vzorovaný set" class="product-image">
            </a>
            <h3>Vintage vzorovaný set</h3>
            <p>Nádherný vzorovaný set.</p>
            <p class="price">180,00€</p>
            
            <input type="checkbox" id="fa1" class="favorite-checkbox">
            <label for="fa1" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html"> 
                <img src="setiky/cajnik_pohare.jpg" alt="Set s čajníkom" class="product-image">
            </a>
            <h3>Set s čajníkom</h3>
            <p>Štýlový čajník s pôvabnými pohármi.</p>
            <p class="price">115,00€</p>
        
            <input type="checkbox" id="fa2" class="favorite-checkbox">
            <label for="fa2" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html"> 
                <img src="setiky/citronovy set.jpg" alt="Cintrónový set" class="product-image">
            </a>
            <h3>Cintrónový set</h3>
            <p>Svieži citrónový akcent pre stôl.</p>
            <p class="price">150,00€</p>

            <input type="checkbox" id="fa3" class="favorite-checkbox">
            <label for="fa3" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html"> 
                <img src="setiky/pekny_set.jpg" alt="Pohárový set" class="product-image">
            </a>
            <h3>Pohárový set</h3>
            <p>Set z ktorého vám bude chutiť káva.</p>
            <p class="price">115,00€</p>
        
            <input type="checkbox" id="fa4" class="favorite-checkbox">
            <label for="fa4" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="setiky/ceresnovy set.jpg" alt="Čerešňový set" class="product-image">
            </a>
            <h3>Čerešňový set</h3>
            <p>Jemný čerešňový dekor pre stôl.</p>
            <p class="price">110,00€</p>

            <input type="checkbox" id="fa5" class="favorite-checkbox">
            <label for="fa5" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="setiky/modry set.jpg" alt="Modrý elegantný set" class="product-image">
            </a>
            <h3>Modrý elegantný set</h3>
            <p>Modrý dizajn s unikátnym šarmom.</p>
            <p class="price">80,00€</p>
            
            <input type="checkbox" id="fa6" class="favorite-checkbox">
            <label for="fa6" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="setiky/muslovy_Set.jpg" alt="Mušlový set" class="product-image">
            </a>
            <h3>Mušlový set</h3>
            <p>Morské inšpirované kúsky plné elegancie.</p>
            <p class="price">90,00€</p>
            
            <input type="checkbox" id="fa7" class="favorite-checkbox">
            <label for="fa7" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>
        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="setiky/lucnekvety_set.jpg" alt="Set Lúčne kvety" class="product-image">
            </a>
            
            <h3>Set Lúčne kvety</h3>
            <p>Lúčne kvietky ktoré spestria každú domácnosť.</p>
            <p class="price">135,00€</p>
            
            <input type="checkbox" id="fa8" class="favorite-checkbox">
            <label for="fa8" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
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