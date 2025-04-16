@extends('layouts.app')

@section('title', 'Pohare - Keramo.sk')

@section('content')
<!-- Kategória Poháre -->
<section class="products">
        <h2>Poháre</h2>
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
                <img src="pohare/modry_pohar.jpg" alt="Keramický pohár s modrou glazúrou" class="product-image">
            </a>
            <h3>Keramický pohár s modrou glazúrou</h3>
            <p>Kvalitná ručná práca, ideálna na rannú kávu či čaj.</p>
            <p class="price">15,00€</p>
                        
            <input type="checkbox" id="f1" class="favorite-checkbox">
            <label for="f1" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/simple_pohar.jpg" alt="Moderný keramický pohár" class="product-image">
            </a>
            <h3>Moderný keramický pohár</h3>
            <p>Minimalistický dizajn, vhodný do každej domácnosti.</p>
            <p class="price">9,00€</p>
                        
            <input type="checkbox" id="f2" class="favorite-checkbox">
            <label for="f2" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/srdieckovy_pohar.jpg" alt="Keramický pohár v tvare srdca" class="product-image">
            </a>
            
            <h3>Keramický pohár v tvare srdca</h3>
            <p>Darček pre zaľúbených.</p>
            <p class="price">17,00€</p>
                        
            <input type="checkbox" id="f3" class="favorite-checkbox">
            <label for="f3" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                 <img src="pohare/jahodkovy_pohar.jpg" alt="Jahodový pohár" class="product-image">
            </a>
           
            <h3>Jahodový pohár</h3>
            <p>Roztomilý dizajn aj pre tých najmenších</p>
            <p class="price">12,00€</p>

            <input type="checkbox" id="f4" class="favorite-checkbox">
            <label for="f4" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/asymetricky_pohar.jpg" alt="Asymetrický pohár s kvetmi" class="product-image">
            </a>
            
            <h3>Asymetrický pohár s kvetmi</h3>
            <p>Nerovnomerný tvar, originálny</p>
            <p class="price">16,00€</p>
                        
            <input type="checkbox" id="f5" class="favorite-checkbox">
            <label for="f5" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/ruzovy_pohar.jpg" alt="Ružový kvetinový pohár" class="product-image">
            </a>
            
            <h3>Ružový kvetinový pohár</h3>
            <p>Ružový, roztomilý dizajn</p>
            <p class="price">16,00€</p>
                        
            <input type="checkbox" id="f6" class="favorite-checkbox">
            <label for="f6" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/modrekvietky_pohar.jpg" alt="Pohár Blue Flower" class="product-image">
            </a>
            
            <h3>Pohár Blue Flower</h3>
            <p>Modrý, jemný dizajn</p>
            <p class="price">13,00€</p>
                        
            <input type="checkbox" id="f7" class="favorite-checkbox">
            <label for="f7" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/lemon_pohar.jpg" alt="Cintronový Pohár" class="product-image">
            </a>
            
            <h3>Cintronový Pohár</h3>
            <p>Svieži pohár na kávičku, aj s tématickým podnosom</p>
            <p class="price">24,00€</p>
                        
            <input type="checkbox" id="f8" class="favorite-checkbox">
            <label for="f8" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/muchotravkovy_pohar.jpg" alt="Muchotrávkový pohár" class="product-image">
            </a>
            
            <h3>Muchotrávkový pohár</h3>
            <p>Ručne malované muchotrávky na keramickom hrnčeku</p>
            <p class="price">14,00€</p>
                        
            <input type="checkbox" id="f9" class="favorite-checkbox">
            <label for="f9" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>
        

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/roztomily_pohar.jpg" alt="Muchotrávkový pohár" class="product-image">
            </a>
            
            <h3>Muchotrávkový pohár</h3>
            <p>Ručne malované muchotrávky na keramickom hrnčeku</p>
            <p class="price">14,00€</p>
                        
            <input type="checkbox" id="f10" class="favorite-checkbox">
            <label for="f10" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                <img src="pohare/totoro.jpg" alt="Muchotrávkový pohár" class="product-image">
            </a>
            
            <h3>Muchotrávkový pohár</h3>
            <p>Ručne malované muchotrávky na keramickom hrnčeku</p>
            <p class="price">14,00€</p>
                        
            <input type="checkbox" id="f11" class="favorite-checkbox">
            <label for="f11" class="heart-icon">
                <i class="fas fa-heart"></i>
            </label>
        </div>

        <div class="product-item">
            <a href="detail.html?produkt=jahodovy">
                 <img src="pohare/srdcove_pohare.jpg" alt="Muchotrávkový pohár" class="product-image">
            </a>
           
            <h3>Muchotrávkový pohár</h3>
            <p>Ručne malované muchotrávky na keramickom hrnčeku</p>
            <p class="price">14,00€</p>
                        
            <input type="checkbox" id="f12" class="favorite-checkbox">
            <label for="f12" class="heart-icon">
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