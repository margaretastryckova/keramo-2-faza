<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $slug)
    {
        // Find the product by slug
        $product = Product::where('slug', $slug)->firstOrFail();
        $quantity = (int) $request->input('quantity', 1);

        // Get the current cart from session or initialize an empty array
        $cart = session()->get('cart', []);

        // Add the product to the cart (or update quantity)
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

        // Save the cart back to the session
        session()->put('cart', $cart);

        session()->flash('cart_popup', [
            'nazov' => $product->nazov,
            'cena' => $product->cena * $quantity,
            'obrazok' => $product->obrazok,
            'quantity' => $quantity,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
    }
}