@extends('layouts.app')

@section('title', 'Domov - Keramo.sk')

@section('content')

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
            <a href="pohare.html">
                <img src="pohare/il_fullxfull.5601631086_nnqk.webp" alt="Poháre">
                <span class="text">Poháre</span>
            </a>
        </div>
        <div class="kategoria">
            <a href="taniere.html">
                <img src="taniere/tanier_kvetinajpg.jpg" alt="Taniere">
                <span class="text">Taniere</span>
            </a>
        </div>
        <div class="kategoria">
            <a href="sety.html">
                <img src="setiky/sety.jpg" alt="Sety">
                <span class="text">Sety</span>
            </a>
        </div>
        <div class="kategoria">
            <a href="misky.html">
                <img src="misky/asian misky.webp" alt="Misky">
                <span class="text">Misky</span>
            </a>
        </div>
        <div class="kategoria">
            <a href="ine.html">
                <img src="ine/dzban s uchom.jpg" alt="Iné">
                <span class="text">Iné</span>
            </a>
        </div>
    </div>
</section>

<section class="about-us" id="o-nas">
    {{-- Tu daj tie video bloky ako predtým --}}
    {{-- Skopíruj celý obsah about-us sekcie --}}
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
