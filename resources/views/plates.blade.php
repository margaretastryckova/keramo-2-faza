@extends('layouts.app')

@section('title', 'Taniere - Keramo.sk')

@section('content')
<section class="products">
    <h2>Taniere</h2>
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
            <img src="taniere/jahodovy.jpg" alt="Jahodový tanier" class="product-image">
        </a>
        <h3>Jahodový tanier</h3>
        <p>Keramický tanier, z ktorého vám bude chutiť.</p>
        <p class="price">20,00€</p>
        
        <input type="checkbox" id="fav1" class="favorite-checkbox">
        <label for="fav1" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html?produkt=vintage">
            <img src="taniere/starosvecky.jpg" alt="Vintage tanier" class="product-image">
        </a>
        <h3>Vintage tanier</h3>
        <p>V jednoduchosti je krása.</p>
        <p class="price">10,00€</p>
    
        <input type="checkbox" id="fav2" class="favorite-checkbox">
        <label for="fav2" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/modre_vintage.jpg" alt="Kvetinvý tanier" class="product-image">
        </a>
        <h3>Kvetinový tanier</h3>
        <p>Vzorovaný dizajn oživý nejednú kuchyňu</p>
        <p class="price">20,00€</p>

        <input type="checkbox" id="fav3" class="favorite-checkbox">
        <label for="fav3" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/zeleny.jpg" alt="Prírodný tanier" class="product-image">
        </a>
        <h3>Prírodný tanier</h3>
        <p>Keramický tanier s lúčnou tématikou.</p>
        <p class="price">16,00€</p>

        <input type="checkbox" id="fav4" class="favorite-checkbox">
        <label for="fav4" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/asymetric_tanier.jpg" alt="Asymetrický tanier" class="product-image">
        </a>
        <h3>Asymetrický tanier</h3>
        <p>Asymetrické tvary tomu dodajú tú správnu chuť.</p>
        <p class="price">23,00€</p>
        
        <input type="checkbox" id="fav5" class="favorite-checkbox">
        <label for="fav5" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/detsky_tanier.jpg" alt="Detský tanier" class="product-image">
        </a>
        <h3>Detský tanier</h3>
        <p>Bude chutiť aj tým najmenším.</p>
        <p class="price">17,00€</p>
        
        <input type="checkbox" id="fav6" class="favorite-checkbox">
        <label for="fav6" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>
    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/citrusovy tanier.jpg" alt="Citrusový tanier" class="product-image">
        </a>
        <h3>Citrusový tanier</h3>
        <p>Krásny dizajn citrusových plodov je to pravé "citrusové".</p>
        <p class="price">17,00€</p>
        
        <input type="checkbox" id="fav7" class="favorite-checkbox">
        <label for="fav7" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/krasny_tanier.jpg" alt="Ibiscusový tanier" class="product-image">
        </a>
        <h3>Ibiscusový tanier</h3>
        <p>Tanier s červeným ibiscusom, ručná maľba.</p>
        <p class="price">25,00€</p>
        
        <input type="checkbox" id="fav8" class="favorite-checkbox">
        <label for="fav8" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/male_kvietky.jpg" alt="Tanier s drobnými kvetmi" class="product-image">
        </a>
        <h3>Tanier s drobnými kvetmi</h3>
        <p>Pôvabný detail pre každý stôl.</p>
        <p class="price">15,00€</p>
        
        <input type="checkbox" id="fav9" class="favorite-checkbox">
        <label for="fav9" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="detail.html">
            <img src="taniere/asymetricky_tanier.jpg" alt="Asymetrický tanier s červeným kvetom" class="product-image">
        </a>
        <h3>Asymetrický tanier s červeným kvetom</h3>
        <p>Ručná maľba, romantický motív.</p>
        <p class="price">16,00€</p>
        
        <input type="checkbox" id="fav10" class="favorite-checkbox">
        <label for="fav10" class="heart-icon">
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
