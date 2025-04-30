<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        if ($user->favorites()->where('product_id', $product->id)->exists()) {
            return redirect()->back()->with('success', 'Produkt je už v obľúbených.');
        }

        $user->favorites()->attach($product->id);
        return redirect()->back()->with('success', 'Produkt bol pridaný medzi obľúbené!');
    }

    public function index()
    {
        $favorites = Auth::user()->favorites;
        return view('favorit', compact('favorites'));
    }
    
}
