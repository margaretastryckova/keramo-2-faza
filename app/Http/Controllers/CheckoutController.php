<?php 

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
{
    // Validácia
    $validated = $request->validate([
        'email' => 'required|email|max:255',
        'meno' => 'required|string|max:255',
        'priezvisko' => 'required|string|max:255',
        'ulica' => 'required|string|max:255',
        'mesto' => 'required|string|max:255',
        'psc' => 'required|string|max:10',
        'krajina' => 'required|string|in:Slovensko,Česko',
        'telefon' => 'required|string|max:20',
        'delivery' => 'required|in:kurier,odberne,osobny',
        'payment' => 'required|in:card,dobierka,paypal',
        'firma' => 'nullable|string|max:255',
        'predvolba' => 'nullable|string|max:10',
    ]);

    // Získanie košíka zo session
    $cart = session('cart', []);

    // Výpočet celkovej ceny
    $total = collect($cart)->sum(fn($item) => $item['cena'] * $item['quantity']);

    Order::create([
        'user_id' => Auth::id(),
        ...$validated,
        'predvolba' => $request->predvolba,
        'firma' => $request->firma,
        'items' => json_encode($cart), // Ak je to JSON pole v databáze
        'total' => $total,
    ]);

    session()->forget('cart');

    // Presmerovanie
    return redirect()->route('confirm')->with('success', 'Objednávka bola úspešne odoslaná.');
}
}