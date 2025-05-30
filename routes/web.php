<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductAdminController;

// Domovská stránka
Route::get('/home', function () {
    return view('home');
})->name('home');

// Kategórie produktov
Route::get('/plates', [ProductController::class, 'index'])->name('plates')->defaults('kategoria', 'taniere');
Route::get('/cups', [ProductController::class, 'index'])->name('cups')->defaults('kategoria', 'poháre');
Route::get('/sets', [ProductController::class, 'index'])->name('sets')->defaults('kategoria', 'sety');
Route::get('/bowls', [ProductController::class, 'index'])->name('bowls')->defaults('kategoria', 'misky');
Route::get('/others', [ProductController::class, 'index'])->name('others')->defaults('kategoria', 'iné');

// Detail produktu
Route::get('/produkt/{slug}', [ProductController::class, 'show'])->name('product.detail');

// Vyhľadávanie
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Obľúbené produkty
Route::get('/favorit', [FavoriteController::class, 'index'])->middleware('auth')->name('favorit');
Route::post('/favorites/add/{slug}', [FavoriteController::class, 'add'])->middleware('auth')->name('favorites.add');
Route::post('/favorites/toggle', [FavoriteController::class, 'toggle'])->middleware('auth')->name('favorites.toggle');


// Košík
Route::post('/cart/add/{slug}', [CartController::class, 'add'])->name('cart.add');

// Používateľské profily a objednávky
Route::get('/profile', [LoginController::class, 'showProfile'])->name('profile')->middleware('auth');
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
Route::get('/cart', function () {
    return view('cart');
})->name('cart.index');



// Registrácia a prihlásenie
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Dodatočné statické stránky
Route::get('/registration', function () {return view('registration');
})->name('registration');


Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');


Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');


Route::get('/moje-objednavky', [App\Http\Controllers\OrderController::class, 'index'])
    ->middleware('auth')
    ->name('orders.index');




Route::get('/admin/menu', function () {
    return view('admin_menu');
})->name('admin.menu');


// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('index');
    Route::get('/products/create', [ProductAdminController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductAdminController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{id}', [ProductAdminController::class, 'edit'])->name('products.edit');
    Route::delete('/products/delete/{id}', [ProductAdminController::class, 'destroy'])->name('products.delete');
    Route::put('/products/update/{id}', [ProductAdminController::class, 'update'])->name('products.update');


});


use App\Http\Controllers\Auth\ProfileController;

Route::middleware('auth')->group(function () {
    Route::get('/profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.change-password');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.change-password.store');
    Route::get('/profile/change-email', [ProfileController::class, 'showChangeEmailForm'])->name('profile.change-email');
    Route::post('/profile/change-email', [ProfileController::class, 'changeEmail'])->name('profile.change-email.store');
});