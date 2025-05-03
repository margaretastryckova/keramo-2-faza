<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Zoznam produktov (s filtrami, zoradením a stránkovaním)
    public function index(Request $request)
    {
        $query = Product::query();

        // Filtrovanie podľa kategórie (napr. poháre, taniere)
        if ($request->has('kategoria')) {
            $query->where('kategoria', $request->kategoria);
        }

        // Filtrovanie podľa ceny
        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereBetween('cena', [$request->price_min, $request->price_max]);
        }

        // Filtrovanie podľa farby
        if ($request->has('color')) {
            $query->where('farba', $request->color);
        }

        // Filtrovanie podľa rozmeru
        if ($request->has('size')) {
            $query->where('rozmer', $request->size);
        }

        // Zoradenie
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'najlacnejsie':
                    $query->orderBy('cena', 'asc');
                    break;
                case 'najdrahsie':
                    $query->orderBy('cena', 'desc');
                    break;
                case 'najnovsie':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'najoblubenejsie':
                    // Predpokladáme, že máš pole pre obľúbenosť alebo hodnotenie
                    $query->orderBy('created_at', 'desc'); // Príklad, uprav podľa potreby
                    break;
            }
        }

        // Stránkovanie (10 produktov na stránku)
        $products = $query->paginate(10);

        $favoritedIds = [];
        if (auth()->check()) {
            $favoritedIds = auth()->user()->favorites()->pluck('product_id')->toArray();
        }

        return view('cups', compact('products', 'favoritedIds'));
    }

    // Detail produktu
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $suggestedProducts = Product::where('kategoria', $product->kategoria)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(3)
            ->get();
        return view('detail', compact('product', 'suggestedProducts'));
    }

    // Plnotextové vyhľadávanie
    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchTerm = '%' . $query . '%';
        $products = Product::whereRaw("LOWER(TRANSLATE(nazov, 'áäčďéíľňóôŕšťúýž', 'aacdeilnorstuyz')) LIKE LOWER(TRANSLATE(?, 'áäčďéíľňóôŕšťúýž', 'aacdeilnorstuyz'))", [$searchTerm])
            ->orWhereRaw("LOWER(TRANSLATE(popis, 'áäčďéíľňóôŕšťúýž', 'aacdeilnorstuyz')) LIKE LOWER(TRANSLATE(?, 'áäčďéíľňóôŕšťúýž', 'aacdeilnorstuyz'))", [$searchTerm])
            ->orWhereRaw("LOWER(TRANSLATE(kategoria, 'áäčďéíľňóôŕšťúýž', 'aacdeilnorstuyz')) LIKE LOWER(TRANSLATE(?, 'áäčďéíľňóôŕšťúýž', 'aacdeilnorstuyz'))", [$searchTerm])
            ->paginate(10);

        return view('search', compact('products', 'query'));
    }
}