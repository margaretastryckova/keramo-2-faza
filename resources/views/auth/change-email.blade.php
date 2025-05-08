@extends('layouts.app')

@section('content')
<div class="container-profil">
    <h3 class="text-center">Zmeniť e-mailovú adresu</h3>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <form method="POST" action="{{ route('profile.change-email.store') }}">
        @csrf

        <div class="form-group">
            <label for="email">Nový e-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" placeholder="Zadajte nový e-mail" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Heslo (na overenie)</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Zadajte svoje heslo" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn-profil">Zmeniť e-mail</button>
    </form>
</div>
@endsection