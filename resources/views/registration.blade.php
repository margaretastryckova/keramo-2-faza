@extends('layouts.app')

@section('content')
<div class="container-profil">
    <div class="profil-header-container">
        <a href="{{ route('login') }}" class="prihlasit-link">Prihlásiť sa</a>
        <span class="divider"></span>
        <h3 class="text-center">Registrovať sa</h3>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="meno">Meno</label>
            <input type="text" name="meno" id="meno" class="form-control" value="{{ old('meno') }}" placeholder="Zadajte svoje meno">
            @error('meno')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="priezvisko">Priezvisko</label>
            <input type="text" name="priezvisko" id="priezvisko" class="form-control" value="{{ old('priezvisko') }}" placeholder="Zadajte svoje priezvisko">
            @error('priezvisko')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Zadajte svoj e-mail">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="heslo">Heslo</label>
            <input type="password" name="heslo" id="heslo" class="form-control" placeholder="Zadajte heslo">
            @error('heslo')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="heslo_confirmation">Potvrď heslo</label>
            <input type="password" name="heslo_confirmation" id="heslo_confirmation" class="form-control" placeholder="Potvrďte heslo">
        </div>

        <div class="form-group">
            <label>Ako by sme ťa mali oslovovať?</label>
            <div class="radio-group">
                <label><input type="radio" name="oslovenie" value="pani" {{ old('oslovenie') == 'pani' ? 'checked' : '' }}> Pani</label>
                <label><input type="radio" name="oslovenie" value="pan" {{ old('oslovenie') == 'pan' ? 'checked' : '' }}> Pán</label>
                <label><input type="radio" name="oslovenie" value="ine" {{ old('oslovenie') == 'ine' ? 'checked' : '' }}> Iné</label>
                <label><input type="radio" name="oslovenie" value="nezadavat" {{ old('oslovenie') == 'nezadavat' ? 'checked' : '' }}> Radšej neuvádzať</label>
            </div>
            @error('oslovenie')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <input type="checkbox" name="newsletter" id="newsletter" {{ old('newsletter') ? 'checked' : '' }}>
            <label for="newsletter">
                Mám záujem dostávať od spoločnosti KERAMO newsletter o aktuálnych ponukách a akciových zľavách 
                v súlade s <strong>Zásady ochrany osobných údajov.</strong>
            </label>
        </div>

        <button type="submit" class="btn-profil">Uložiť profil</button>
    </form>
</div>
@endsection