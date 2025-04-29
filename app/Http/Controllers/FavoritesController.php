<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function add(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $favorites = session()->get('favorites', []);

        if (!in_array($product->id, $favorites)) {
            $favorites[] = $product->id;
            session()->put('favorites', $favorites);
            session()->flash('success', 'Produkt bol pridaný medzi obľúbené!');
        }

        return redirect()->back();
    }
}