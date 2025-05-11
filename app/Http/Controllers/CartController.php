<?php

//sprava pridavania, aktualizacie a odstranenia produktov z kosika 

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $quantity = (int) $request->input('quantity', 1);

        if (Auth::check()) {
            $user = Auth::user();
            $cartItem = CartItem::firstOrNew([
                'user_id' => $user->id,
                'product_id' => $product->id,
            ]);
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
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
        }

        session()->flash('cart_popup', [
            'nazov' => $product->nazov,
            'cena' => $product->cena * $quantity,
            'obrazok' => $product->obrazok,
            'quantity' => $quantity,
        ]);

        return redirect()->back()->with('success', 'Produkt bol pridaný do košíka!');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $quantity = max(1, (int) $request->input('quantity'));

        if (Auth::check()) {
            $user = Auth::user();
            $cartItem = CartItem::where('user_id', $user->id)->where('product_id', $id)->first();
            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }

            $total = CartItem::with('product')
                ->where('user_id', $user->id)
                ->get()
                ->sum(fn($item) => $item->product->cena * $item->quantity);
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
                session()->put('cart', $cart);
            }

            $total = collect($cart)->sum(fn($item) => $item['cena'] * $item['quantity']);
        }

        return response()->json([
            'success' => true,
            'new_total' => $total
        ]);
    }

    public function remove(Request $request)
    {
        $id = $request->input('id');

        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->route('cart.index');
    }
}
