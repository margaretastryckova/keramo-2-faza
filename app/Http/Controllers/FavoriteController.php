<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $user = User::user();
        

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

    public function toggle(Request $request)
    {
        $product = Product::where('slug', $request->slug)->firstOrFail();
        $user = User::user();

        $attached = $user->favorites()->where('product_id', $product->id)->exists();

        if ($attached) {
            $user->favorites()->detach($product->id);
            return response()->json(['favorited' => false]);
        } else {
            $user->favorites()->attach($product->id);
            return response()->json(['favorited' => true]);
        }
    }

    
}