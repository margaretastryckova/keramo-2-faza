<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Pridanie do košíka
    public function add(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $quantity = (int) $request->input('quantity', 1);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                'id' => $product->id,
                'nazov' => $product->nazov,
                'cena' => $product->cena,
                'obrazok' => $product->obrazok,
                'quantity' => $quantity,
            ];
        }

        session()->put('cart', $cart);

        session()->flash('cart_popup', [
            'nazov' => $product->nazov,
            'cena' => $product->cena * $quantity,
            'obrazok' => $product->obrazok,
            'quantity' => $quantity,
        ]);

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
    }

    // Aktualizácia množstva
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');
        $quantity = max(1, (int) $request->input('quantity'));

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    // Odstránenie produktu z košíka
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }
}
