@extends('layouts.app')

@section('content')
<div class="container-profil">
    <div class="profil-header-container">
        <a href="{{ url('/registration') }}" class="prihlasit-link">Prihlásiť sa</a>
        <span class="divider"></span>
        <h3 class="text-center">Registrovať sa</h3>
    </div>

    <input type="checkbox" id="popup-toggle" class="popup-toggle" style="display: none;">

    <form>
        <div class="form-group">
            <label for="meno">Meno</label>
            <input type="text" id="meno" class="form-control" placeholder="Zadajte svoje meno">
        </div>
        <div class="form-group">
            <label for="priezvisko">Priezvisko</label>
            <input type="text" id="priezvisko" class="form-control" placeholder="Zadajte svoje priezvisko">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" class="form-control" placeholder="Zadajte svoj e-mail">
        </div>
        <div class="form-group">
            <label for="heslo">Heslo</label>
            <input type="password" id="heslo" class="form-control" placeholder="Zadajte heslo">
        </div>
        <div class="form-group">
            <label>Ako by sme ťa mali oslovovať?</label>
            <div class="radio-group">
                <label><input type="radio" name="oslovenie" value="pani"> Pani</label>
                <label><input type="radio" name="oslovenie" value="pan"> Pán</label>
                <label><input type="radio" name="oslovenie" value="ine"> Iné</label>
                <label><input type="radio" name="oslovenie" value="nezadavat"> Radšej neuvádzať</label>
            </div>
        </div>
        <div class="form-group">
            <input type="checkbox" id="newsletterik">
            <label for="newsletter">
                Mám záujem dostávať od spoločnosti KERAMO newlettre o aktuálnych ponukách a akciových zľavách 
                v súlade s <strong>Zásady ochrany osobných údajov.</strong>
            </label>
        </div>
        <label for="popup-toggle" class="btn-profil">Uložiť profil</label>
    </form>

    <!-- Pop-up uspesne zaregistrovany -->
    <div id="successPopup" class="popup-successful-prihlasenie">
        <a href="{{ url('/profil') }}" for="popup-toggle" class="popup-background"></a>
        <div class="popup-content-success">
            <span class="checkmark">✔</span>
            <a href="{{ url('/profil') }}" for="succes-toggle" class="close-btn-profil-succes">×</a>
            <p>Váš profil bol úspešne vytvorený. Prosím prihláste sa.</p>
        </div>
    </div>
</div>
@endsection
