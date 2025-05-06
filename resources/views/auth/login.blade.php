@extends('layouts.app')

@section('content')
<div class="container-profil">
    <div class="profil-header-container">
        <h2 class="text-center">Prihlásiť sa</h2>
        <span class="divider"></span>
        <a href="{{ route('registration') }}" class="register-link">Registrovať sa</a>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Zadajte svoj e-mail">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Heslo</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Zadajte heslo">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group" style="text-align: right; margin-bottom: 20px;">
            <a href="#" style="font-size: 14px; color: #007bff; text-decoration: none;">Zabudol si heslo?</a>
        </div>

        <button type="submit" class="btn-profil" style="font-size: 18px; padding: 12px; display: block; text-align: center">Prihlásiť sa</button>
    </form>
</div>
@endsection