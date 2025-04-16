@extends('layouts.app')

@section('title', 'Misky - Keramo.sk')

@section('content')

<section class="products">
        <h2>Misky</h2>
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
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/jahodova_asymetric.jpg" alt="Jahodová miska" class="product-image">
            </a>
            
            <h3>Jahodová miska</h3>
            <p>Jahodová miska s asymetrickým tvarom.</p>
            <p class="price">18,00€</p>
            
            <input type="checkbox" id="o1" class="favorite-checkbox">
            <label for="o1" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/muchotravkova.jpg" alt="Miska s muchotrávkami" class="product-image">
            </a>
            
            <h3>Miska s muchotrávkami</h3>
            <p>Roztomilá miska s hríbikmi.</p>
            <p class="price">18,00€</p>
            
            <input type="checkbox" id="o2" class="favorite-checkbox">
            <label for="o2" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/tmava_miska.jpg" alt="Tmavá kvetinová miska" class="product-image">
            </a>
            
            <h3>Tmavá kvetinová miska</h3>
            <p>Kvalitná ručná práca, praktická na ovocie či dezerty.</p>
            <p class="price">14,00€</p>
            
            <input type="checkbox" id="o3" class="favorite-checkbox">
            <label for="o3" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/simple_bowls.jpg" alt="Minimalistické misky" class="product-image">
            </a>
            
            <h3>Minimalistické misky</h3>
            <p>Jednoduchý minimalistický dizajn.</p>
            <p class="price">20,00€</p>
            
            <input type="checkbox" id="o4" class="favorite-checkbox">
            <label for="o4" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/simple_misky.jpg" alt="Sada veselých misiek" class="product-image">
            </a>
            
            <h3>Sada veselých misiek</h3>
            <p>Farebné vzory, vhodné na servírovanie snackov či dezertov.</p>
            <p class="price">10,00€</p>
            
            <input type="checkbox" id="o5" class="favorite-checkbox">
            <label for="o5" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/misky na stojane.jpg" alt="Misky na stojane" class="product-image">
            </a>
            
            <h3>Misky na stojane</h3>
            <p>Minimalistický dizajn vyvíšených misiek.</p>
            <p class="price">24,00€</p>
            
            <input type="checkbox" id="o6" class="favorite-checkbox">
            <label for="o6" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/asian misky.webp" alt="Misky na azijský spôsob" class="product-image">
            </a>
            
            <h3>Misky na azijský spôsob</h3>
            <p>Azijská miska aj s paličkami.</p>
            <p class="price">15,00€</p>
            
            <input type="checkbox" id="o7" class="favorite-checkbox">
            <label for="o7" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/figova_miska.jpg" alt="Vlnená miska" class="product-image">
            </a>
            
            <h3>Vlnená miska</h3>
            <p>Elegantná miska s jemne zvlneným okrajom, ideálna na ovocie.</p>
            <p class="price">20,00€</p>
            
            <input type="checkbox" id="o8" class="favorite-checkbox">
            <label for="o8" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="misky/velmi_asymetric.jpg" alt="Asymetrická miska" class="product-image">
            </a>
            
            <h3>Asymetrická miska</h3>
            <p>Jedinečný tvar a glazúra, pútavý prvok do interiéru.</p>
            <p class="price">28,00€</p>
            
            <input type="checkbox" id="o9" class="favorite-checkbox">
            <label for="o9" class="heart-icon">
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