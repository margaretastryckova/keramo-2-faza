@extends('layouts.app')

@section('title', 'Domov - Keramo.sk')

@section('content')
<header class="header-main">
    <div class="line">
        <a href="#kategorie" class="ctn">Nakupuj teraz</a>          
    </div>
</header>

<section class="intro-section">
    <div>
        <p class="intro-text">
            Objavte kúzlo ručne vyrábaných keramických pokladov, 
            ktoré dodajú vášmu domovu teplo, 
            eleganciu a jedinečný štýl.
        </p>
    </div>
</section>

<section id="kategorie">
    <div class="kategorie">
        <div class="kategoria">
            <a href="{{ route('cups') }}">
                <img src="pohare/il_fullxfull.5601631086_nnqk.webp" alt="Poháre">
                <span class="text">Poháre</span>
            </a>
        </div>
        <div class="kategoria">
        <a href="{{ route('plates') }}">
            <img src="taniere/tanier_kvetinajpg.jpg" alt="Taniere">
            <span class="text">Taniere</span>
        </a>
        </div>
        <div class="kategoria">
            <a href="{{ route('sets') }}">
                <img src="setiky/sety.jpg" alt="Sety">
                <span class="text">Sety</span>
            </a>
        </div>
        <div class="kategoria">
            <a href="{{ route('bowls') }}">
                <img src="misky/asian misky.webp" alt="Misky">
                <span class="text">Misky</span>
            </a>
        </div>
        <div class="kategoria">
            <a href="{{ route('others') }}">
                <img src="ine/dzban s uchom.jpg" alt="Iné">
                <span class="text">Iné</span>
            </a>
        </div>
    </div>
</section>

<section class="about-us" id="o-nas">
    <h2>O nás</h2>
        <div class="about-block">
            <video autoplay muted loop playsinline class="about-video">
                <source src="videa/tocky_zhora.mp4" type="video/mp4">
                Váš prehliadač nepodporuje prehrávanie videa.
            </video>
            <div class="about-text">
                <h3>Naša vášeň pre keramiku</h3>
                <p>Vitajte v KERAMO, kde sa vášeň pre keramiku mení na jedinečné umelecké diela. S láskou k remeslu a detailom tvoríme originálne kúsky, ktoré dodajú vášmu domovu teplo a osobitý štýl.</p>
            </div>
        </div>
        
    
        <div class="about-block reverse">
            <video autoplay muted loop playsinline class="about-video">
                <source src="videa/taniere.mp4" type="video/mp4">
                Váš prehliadač nepodporuje prehrávanie videa.
            </video>
            <div class="about-text">
                <h3>Viacero ateliérov</h3>
                <p>Naša sieť ateliérov po celom Slovensku umožňuje tvorbu rôznych štýlov a kolekcií. Každý ateliér má svoj rukopis, čím vznikajú unikátne produkty s dušou.</p>
            </div>
        </div>
        
        <div class="about-block">
            <video autoplay muted loop playsinline class="about-video">
                <source src="videa/malovanie.mp4" type="video/mp4">
                Váš prehliadač nepodporuje prehrávanie videa.
            </video>
            <div class="about-text">
                <h3>Spolupracujeme s umelcami</h3>
                <p>Podporujeme lokálnych umelcov, keramikov a tvorcov. V KERAMO nájdete nielen produkty našej značky, ale aj tvorbu talentovaných ľudí z rôznych regiónov.</p>
            </div>
        </div>
</section>

<section class="newsletter-section">
    <div class="newsletter">
        <p>Chceš dostávať pravidelne info o novinkách a akciách? Nechaj nám email.</p>
        <form action="#" method="POST">
            <input type="email" placeholder="Zadaj svoj email" required>
            <button type="submit">Odoslať</button>
        </form>
    </div>
</section>

@endsection
