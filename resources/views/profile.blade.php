
@extends('layouts.app') 

@section('content')
    <div class="container-profil">
        <div class="profil-header-container">
            <h2 class="text-center">Prihlásiť sa</h2>
            <span class="divider"></span>
            <a href="registracia.html" class="register-link">Registrovať sa</a>
        </div>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Zadajte svoj e-mail" required>
            </div>
            <div class="form-group">
                <label for="heslo">Heslo</label>
                <input type="password" id="heslo" name="password" class="form-control" placeholder="Zadajte svoje heslo" required>
            </div>

            <div class="form-group" style="text-align: right; margin-bottom: 20px;">
                <a href="#" style="font-size: 14px; color: #007bff; text-decoration: none;">Zabudol si heslo?</a>
            </div>

            <button type="submit" class="btn-profil" style="font-size: 18px; padding: 12px; display: block; text-align: center">Prihlásiť sa</button>
            
            <div class="admin-login-link">
                <a href="AdminMenu.html">Prihlásiť sa ako admin</a>
            </div>
        </form>
    </div>
@endsection
