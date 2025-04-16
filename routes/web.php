<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetController;


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/plates', function () {
    return view('plates');
})->name('plates');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/sets', function () {
    return view('sets');
})->name('sets');

Route::get('/bowls', function () {
    return view('bowls');
})->name('bowls');

Route::get('/others', function () {
    return view('others');
})->name('others');

Route::get('/profile', function () {
    return view('profile'); 
})->name('profile');

Route::get('/cups', function () {
    return view('cups'); 
})->name('cups');








Route::get('/produkt/{slug}', function ($slug) {
    $produkty = [
        'modry-pohar' => [
            'nazov' => 'Keramický pohár s modrou glazúrou',
            'popis' => 'Tento krásny keramický pohár s modrou glazúrou...',
            'cena' => '15,00€',
            'obrazok' => 'pohare/modry_pohar.jpg',
            'detail' => 'pohare/detail modreho pohara.jpg',
            'objem' => '200 ml',
            'rozmer' => 'malý',
        ],
        'matcha-set' => [
            'nazov' => 'Matcha set',
            'popis' => 'Minimalistický set na prípravu matchy...',
            'cena' => '50,00€',
            'obrazok' => 'ine/matcha_maker.jpg',
            'detail' => 'ine/detail_matcha.jpg',
            'objem' => '300 ml',
            'rozmer' => 'stredný',
        ],
        // ďalšie produkty...
    ];

    if (!isset($produkty[$slug])) {
        abort(404);
    }

    return view('detail', ['produkt' => $produkty[$slug]]);
})->name('product.detail');
