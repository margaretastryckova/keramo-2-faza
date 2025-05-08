@extends('layouts.app')

@section('content')
<div class="container-profil">
    <h3 class="text-center">Zmeniť heslo</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form method="POST" action="{{ route('profile.change-password.store') }}">
        @csrf

        <div class="form-group">
            <label for="current_password">Aktuálne heslo</label>
            <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Zadajte aktuálne heslo" required>
            @error('current_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="new_password">Nové heslo</label>
            <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Zadajte nové heslo" required>
            @error('new_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="new_password_confirmation">Potvrď nové heslo</label>
            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Potvrďte nové heslo" required>
        </div>

        <button type="submit" class="btn-profil">Zmeniť heslo</button>
    </form>
</div>
@endsection