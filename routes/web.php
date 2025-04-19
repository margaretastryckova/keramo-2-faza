<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SetController;


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/plates', function () {
    return view('plates');
})->name('plates');

Route::get('/cups', function () {
    return view('cups'); 
})->name('cups');

Route::get('/sets', function () {
    return view('sets');
})->name('sets');

Route::get('/bowls', function () {
    return view('bowls');
})->name('bowls');

Route::get('/others', function () {
    return view('others');
})->name('others');

Route::get('/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/favorit', function () {
    return view('favorit');
})->name('favorit');


Route::get('/profile', function () {
    return view('profile'); 
})->name('profile');

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::get('/myprofile', function () {
    return view('myprofile');
})->name('myprofile');

Route::get('/basket', function () {
    return view('basket');
})->name('basket');

Route::get('/checkoutt', function () {
    return view('checkoutt');
})->name('checkoutt');

Route::get('/confirm', function () {
    return view('confirm');
})->name('confirm');



use App\Http\Controllers\Auth\LoginController;


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile')->middleware('auth');



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
        'srdcovy-pohar' => [
            'nazov' => 'Keramický pohár v tvare srdca',
            'popis' => 'Darček pre zaľúbených.',
            'cena' => '17,00€',
            'obrazok' => 'pohare/srdieckovy_pohar.jpg',
            'detail' => 'pohare/srdieckovy_pohar.jpg',
            'objem' => '250 ml',
            'rozmer' => 'stredný',
        ],
        'jahodovy-pohar' => [
            'nazov' => 'Jahodový pohár',
            'popis' => 'Roztomilý dizajn aj pre tých najmenších.',
            'cena' => '12,00€',
            'obrazok' => 'pohare/jahodkovy_pohar.jpg',
            'detail' => 'pohare/jahodkovy_pohar.jpg',
            'objem' => '200 ml',
            'rozmer' => 'malý',
        ],
        'asymetricky-pohar' => [
        'nazov' => 'Asymetrický pohár s kvetmi',
        'popis' => 'Nerovnomerný tvar, originálny.',
        'cena' => '16,00€',
        'obrazok' => 'pohare/asymetricky_pohar.jpg',
        'detail' => 'pohare/asymetricky_pohar.jpg',
        'objem' => '250 ml',
        'rozmer' => 'stredný',
    ],
    'ruzovy-pohar' => [
        'nazov' => 'Ružový kvetinový pohár',
        'popis' => 'Ružový, roztomilý dizajn.',
        'cena' => '16,00€',
        'obrazok' => 'pohare/ruzovy_pohar.jpg',
        'detail' => 'pohare/ruzovy_pohar.jpg',
        'objem' => '230 ml',
        'rozmer' => 'stredný',
    ],
    'blue-flower' => [
        'nazov' => 'Pohár Blue Flower',
        'popis' => 'Modrý, jemný dizajn.',
        'cena' => '13,00€',
        'obrazok' => 'pohare/modrekvietky_pohar.jpg',
        'detail' => 'pohare/modrekvietky_pohar.jpg',
        'objem' => '240 ml',
        'rozmer' => 'malý',
    ],
    'lemon-pohar' => [
        'nazov' => 'Citronový Pohár',
        'popis' => 'Svieži pohár na kávičku, aj s tématickým podnosom.',
        'cena' => '24,00€',
        'obrazok' => 'pohare/lemon_pohar.jpg',
        'detail' => 'pohare/lemon_pohar.jpg',
        'objem' => '260 ml',
        'rozmer' => 'stredný',
    ],
    'muchotravkovy-pohar' => [
        'nazov' => 'Muchotrávkový pohár',
        'popis' => 'Ručne malované muchotrávky na keramickom hrnčeku.',
        'cena' => '14,00€',
        'obrazok' => 'pohare/muchotravkovy_pohar.jpg',
        'detail' => 'pohare/muchotravkovy_pohar.jpg',
        'objem' => '220 ml',
        'rozmer' => 'malý',
    ],
    'roztomily-pohar' => [
        'nazov' => 'Roztomilý pohár',
        'popis' => 'Ručne malovaný roztomilý dizajn.',
        'cena' => '14,00€',
        'obrazok' => 'pohare/roztomily_pohar.jpg',
        'detail' => 'pohare/roztomily_pohar.jpg',
        'objem' => '230 ml',
        'rozmer' => 'malý',
    ],
    'totoro' => [
        'nazov' => 'Totoro pohár',
        'popis' => 'Ručne maľovaný dizajn inšpirovaný Totoro postavičkou.',
        'cena' => '14,00€',
        'obrazok' => 'pohare/totoro.jpg',
        'detail' => 'pohare/totoro.jpg',
        'objem' => '250 ml',
        'rozmer' => 'malý',
    ],
    'srdcove-pohare' => [
        'nazov' => 'Srdcové poháre',
        'popis' => 'Ručne malované poháre so srdcovým motívom.',
        'cena' => '14,00€',
        'obrazok' => 'pohare/srdcove_pohare.jpg',
        'detail' => 'pohare/srdcove_pohare.jpg',
        'objem' => '240 ml',
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
