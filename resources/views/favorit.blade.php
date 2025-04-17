@extends('layouts.app')

@section('content')
<section class="products">
    <h2>Moje obľúbené</h2>

    <div class="product-item">
        <a href="{{ url('/detail') }}">
            <img src="{{ asset('setiky/vzorovany_vintage.jpg') }}" alt="Vintage vzorovaný set" class="product-image">
        </a>
        <h3>Vintage vzorovaný set</h3>
        <p>Nádherný vzorovaný set.</p>
        <p class="price">180,00€</p>
        <input type="checkbox" id="fa1" class="favorite-checkbox">
        <label for="fa1" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail') }}">
            <img src="{{ asset('setiky/citronovy set.jpg') }}" alt="Citronový set" class="product-image">
        </a>
        <h3>Cintrónový set</h3>
        <p>Svieži citrónový akcent pre stôl.</p>
        <p class="price">150,00€</p>
        <input type="checkbox" id="fa3" class="favorite-checkbox">
        <label for="fa3" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail?produkt=jahodovy') }}">
            <img src="{{ asset('misky/tmava_miska.jpg') }}" alt="Tmavá kvetinová miska" class="product-image">
        </a>
        <h3>Tmavá kvetinová miska</h3>
        <p>Kvalitná ručná práca, praktická na ovocie či dezerty.</p>
        <p class="price">14,00€</p>
        <input type="checkbox" id="o3" class="favorite-checkbox">
        <label for="o3" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail?produkt=jahodovy') }}">
            <img src="{{ asset('setiky/modry set.jpg') }}" alt="Modrý elegantný set" class="product-image">
        </a>
        <h3>Modrý elegantný set</h3>
        <p>Modrý dizajn s unikátnym šarmom.</p>
        <p class="price">80,00€</p>
        <input type="checkbox" id="fa6" class="favorite-checkbox">
        <label for="fa6" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail?produkt=jahodovy') }}">
            <img src="{{ asset('misky/simple_bowls.jpg') }}" alt="Minimalistické misky" class="product-image">
        </a>
        <h3>Minimalistické misky</h3>
        <p>Jednoduchý minimalistický dizajn.</p>
        <p class="price">20,00€</p>
        <input type="checkbox" id="o4" class="favorite-checkbox">
        <label for="o4" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail?produkt=jahodovy') }}">
            <img src="{{ asset('misky/simple_misky.jpg') }}" alt="Sada veselých misiek" class="product-image">
        </a>
        <h3>Sada veselých misiek</h3>
        <p>Farebné vzory, vhodné na servírovanie snackov či dezertov.</p>
        <p class="price">10,00€</p>
        <input type="checkbox" id="o5" class="favorite-checkbox">
        <label for="o5" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail?produkt=jahodovy') }}">
            <img src="{{ asset('pohare/srdieckovy_pohar.jpg') }}" alt="Keramický pohár v tvare srdca" class="product-image">
        </a>
        <h3>Keramický pohár v tvare srdca</h3>
        <p>Darček pre zaľúbených.</p>
        <p class="price">17,00€</p>
        <input type="checkbox" id="f3" class="favorite-checkbox">
        <label for="f3" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>

    <div class="product-item">
        <a href="{{ url('/detail?produkt=jahodovy') }}">
            <img src="{{ asset('misky/asian misky.webp') }}" alt="Misky na azijský spôsob" class="product-image">
        </a>
        <h3>Misky na azijský spôsob</h3>
        <p>Azijská miska aj s paličkami.</p>
        <p class="price">15,00€</p>
        <input type="checkbox" id="o7" class="favorite-checkbox">
        <label for="o7" class="heart-icon"><i class="fas fa-heart"></i></label>
    </div>
</section>
@endsection
