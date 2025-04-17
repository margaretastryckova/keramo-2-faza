@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="order-success-wrapper">
        <div class="order-success">
            <i class="fas fa-check-circle"></i>
            <h1>Ďakujeme za váš nákup!</h1>
            <p>Váš nákup prebehol úspešne. Vaša objednávka bola prijatá a je spracovaná.</p>
            <p>Tešíme sa, že ste si vybrali <strong>Keramo.sk</strong>.</p>
            <p>Budeme vás informovať o ďalšom postupe e-mailom.</p>
            <a href="{{ url('/eshop') }}" class="btn-back">Pokračovať v nakupovaní</a>
        </div>
    </div>
</div>
@endsection
