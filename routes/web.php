<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/plates', [ProductController::class, 'index'])->name('plates')->defaults('kategoria', 'taniere');
Route::get('/cups', [ProductController::class, 'index'])->name('cups')->defaults('kategoria', 'poháre');
Route::get('/sets', [ProductController::class, 'index'])->name('sets')->defaults('kategoria', 'sety');
Route::get('/bowls', [ProductController::class, 'index'])->name('bowls')->defaults('kategoria', 'misky');
Route::get('/others', [ProductController::class, 'index'])->name('others')->defaults('kategoria', 'iné');

Route::get('/produkt/{slug}', [ProductController::class, 'show'])->name('product.detail');

Route::get('/search', [ProductController::class, 'search'])->name('search');

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
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile')->middleware('auth');




use App\Http\Controllers\CartController;

Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');


use App\Http\Controllers\FavoriteController;


Route::post('/favorites/add/{slug}', [FavoriteController::class, 'add'])->name('favorites.add');