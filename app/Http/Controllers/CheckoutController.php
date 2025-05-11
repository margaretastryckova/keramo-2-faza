<?php 

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'meno' => 'required|string|max:255',
            'priezvisko' => 'required|string|max:255',
            'ulica' => 'required|string|max:255',
            'mesto' => 'required|string|max:255',
            'psc' => ['required', 'regex:/^\d{5}$/'], // Slovenské PSČ – presne 5 číslic
            'krajina' => 'required|string|in:Slovensko,Česko',
            'telefon' => ['required', 'regex:/^\+?[0-9\s]{7,15}$/'],
            'delivery' => 'required|in:kurier,odberne,osobny',
            'payment' => 'required|in:card,dobierka,paypal',
            'firma' => 'nullable|string|max:255',
            'predvolba' => 'nullable|string|max:10',
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

            $cart = $cartItems->map(function ($item) {
                return [
                    'id' => $item->product->id,
                    'nazov' => $item->product->nazov,
                    'cena' => $item->product->cena,
                    'obrazok' => $item->product->obrazok,
                    'quantity' => $item->quantity,
                ];
            })->toArray();

            $total = collect($cart)->sum(fn($item) => $item['cena'] * $item['quantity']);
        } else {
            $cart = session('cart', []);
            $total = collect($cart)->sum(fn($item) => $item['cena'] * $item['quantity']);
        }

        // Uloženie objednávky
        Order::create([
            'user_id' => Auth::id(),
            ...$validated,
            'predvolba' => $request->predvolba,
            'firma' => $request->firma,
            'items' => $cart, 
            'total' => $total,
        ]);

        // Vymazanie košíka
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->delete();
        } else {
            session()->forget('cart');
        }

        return redirect()->route('confirm')->with('success', 'Objednávka bola úspešne odoslaná.');
    }

}