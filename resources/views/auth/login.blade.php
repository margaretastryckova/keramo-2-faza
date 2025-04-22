@extends('layouts.app')

@section('content')
<div class="container-profil">
    <h3 class="text-center">Prihlásiť sa</h3>

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

        <button type="submit" class="btn-profil">Prihlásiť sa</button>
    </form>
</div>
@endsection