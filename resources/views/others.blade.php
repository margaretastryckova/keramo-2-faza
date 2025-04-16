@extends('layouts.app')

@section('title', 'Ine - Keramo.sk')

@section('content')
<section class="products">
    <h2>Všehodruh</h2>
    <div class="filter-container">
        <!-- Skrytý checkbox na ovládanie zobrazenia filtra -->
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
        <a href="{{ route('product.detail', ['slug' => 'matcha-set']) }}">

            <img src="ine/matcha_maker.jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Matcha set</h3>
        <p>Nádherný minimalistický set na chutnú matchu.</p>
        <p class="price">50,00€</p>
        
        <!-- Checkbox na pridanie do obľúbených -->
        <input type="checkbox" id="favo1" class="favorite-checkbox">
        <label for="favo1" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="{{ route('product.detail', ['slug' => 'vintage set']) }}">
 
            <img src="ine/miska_asymetric.jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Asymetrická miska</h3>
        <p>Jedinečná miska na ovocie.</p>
        <p class="price">30,00€</p>
        
        <input type="checkbox" id="favo2" class="favorite-checkbox">
        <label for="favo2" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="{{ route('product.detail', ['slug' => 'shell_set']) }}">

            <img src="ine/musle.jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Mušlový set</h3>
        <p>Pre každeého, kto má rád morskú tématiku.</p>
        <p class="price">190,00€</p>
        
        <input type="checkbox" id="favo3" class="favorite-checkbox">
        <label for="favo3" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="{{ route('product.detail', ['slug' => 'goose-vase']) }}">

            <img src="ine/hus vaza.jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Váza ako hus</h3>
        <p>Milá váza na jarné kvietky.</p>
        <p class="price">23,00€</p>
        
        <input type="checkbox" id="favo4" class="favorite-checkbox">
        <label for="favo4" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="{{ route('product.detail', ['slug' => 'dzban']) }}">

            <img src="ine/keramik_dzban.jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Keramický ďžbán</h3>
        <p>Nádherný džbán, ručná práca.</p>
        <p class="price">85,00€</p>
        
        <input type="checkbox" id="favo5" class="favorite-checkbox">
        <label for="favo5" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="{{ route('product.detail', ['slug' => 'juicer']) }}">
 
            <img src="ine/odstavovac na citron .jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Odšťavovač na ovocie</h3>
        <p>Milý praktický doplnok do každej domácnosti.</p>
        <p class="price">50,00€</p>
        
        <input type="checkbox" id="favo6" class="favorite-checkbox">
        <label for="favo6" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>

    <div class="product-item">
        <a href="{{ route('product.detail', ['slug' => 'krhla']) }}">

            <img src="ine/polievac kvetov.jpg" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Originálna krhla na kvety</h3>
        <p>Jedinečné polievanie vašich rastlín.</p>
        <p class="price">50,00€</p>
        
        <input type="checkbox" id="favo7" class="favorite-checkbox">
        <label for="favo7" class="heart-icon">
            <i class="fas fa-heart"></i>
        </label>
    </div>
</section>

    <!-- strankovanie -->
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