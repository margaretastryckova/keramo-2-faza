<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ProductAdminController extends Controller
{
    /**
     * Zobrazí formulár na pridanie produktu
     */
    public function create()
    {
        return view('admin_add_product');
    }

    /**
     * Uloží nový produkt do databázy
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nazov' => 'required|string|max:255',
            'kratky_popis' => 'required|string|max:500',
            'detailny_popis' => 'nullable|string',
            'cena' => 'required|numeric',
            'kategoria' => 'required|string',
            'hlavna_fotka' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'dopl_fotka' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'objem' => 'nullable|string|max:255',
            'rozmer' => 'nullable|string|max:255',
            'farba' => 'nullable|string|max:255',
        ]);
    
        // Uloženie hlavnej fotky
        $hlavnaFotka = $request->file('hlavna_fotka');
        $hlavnaNazov = uniqid() . '_' . $hlavnaFotka->getClientOriginalName();
        $hlavnaFotkaPath = Storage::putFileAs('public/pohare', $hlavnaFotka, $hlavnaNazov); // Store the file in the 'public/pohare' directory
        
        // Uloženie doplnkových fotiek
        $detailFotkaPath = null;
        $doplFotkyPaths = [];
        if ($request->hasFile('dopl_fotka')) {
            foreach ($request->file('dopl_fotka') as $fotka) {
                if ($fotka) {
                    $nazov = uniqid() . '_' . $fotka->getClientOriginalName();
                    $path = Storage::putFileAs('public/pohare', $fotka, $nazov);
                    $doplFotkyPaths[] = 'storage/' . $path;

                    // prvú fotku nastavíme ako detail
                    if (!$detailFotkaPath) {
                        $detailFotkaPath = 'storage/' . $path;
                    }
                }
            }
        }

    
        // Uloženie produktu
        Product::create([
            'nazov' => $validated['nazov'],
            'popis' => $validated['kratky_popis'],
            // 'detail' => $validated['detailny_popis'] ?? null,  
            'cena' => $validated['cena'],
            'kategoria' => $validated['kategoria'],
            'obrazok' => 'storage/' . $hlavnaFotkaPath, // File path
            'slug' => Str::slug($validated['nazov'] . '-' . Str::random(5)),
            'objem' => $validated['objem'],
            'rozmer' => $validated['rozmer'],
            'farba' => $validated['farba'],
            'detail' =>'storage/' . $detailFotkaPath,
        ]);
    
        return redirect()->route('admin.menu')->with('success', 'Produkt bol úspešne pridaný.');
    }
    

    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Produkt sa nenašiel.'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Produkt bol úspešne vymazaný.']);
    }


    public function edit($id)
    {
    $product = Product::findOrFail($id);
    return view('admin_edit_product', compact('product'));
    }

    public function update(Request $request, $id)
    {
        // if ($request->hasFile('dopl_fotka')) {
        //     dd($request->file('dopl_fotka')); // Skontroluj, či sa súbor správne posiela
        // }

        $validated = $request->validate([
            'nazov' => 'required|string|max:255',
            'kratky_popis' => 'required|string|max:500',
            'detailny_popis' => 'nullable|string',
            'cena' => 'required|numeric',
            'kategoria' => 'required|string',
            'hlavna_fotka' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dopl_fotka' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'objem' => 'nullable|string|max:255',
            'rozmer' => 'nullable|string|max:255',
            'farba' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);

        // Aktualizácia základných údajov
        $product->update([
            'nazov' => $validated['nazov'],
            'popis' => $validated['kratky_popis'],
            'detailny_popis' => $validated['detailny_popis'] ?? null,
            'cena' => $validated['cena'],
            'kategoria' => $validated['kategoria'],
            'objem' => $validated['objem'],
            'rozmer' => $validated['rozmer'],
            'farba' => $validated['farba'],
            'slug' => Str::slug($validated['nazov'] . '-' . Str::random(5)),
        ]);

        // Uloženie novej hlavnej fotky (ak je nahratá)
        if ($request->hasFile('hlavna_fotka')) {
            // Zmaž starý súbor, ak existuje
            if ($product->obrazok) {
                Storage::delete(str_replace('storage/', 'public/', $product->obrazok));
            }
            $hlavnaFotka = $request->file('hlavna_fotka');
            $hlavnaNazov = uniqid() . '_' . $hlavnaFotka->getClientOriginalName();
            $hlavnaPath = Storage::putFileAs('public/pohare', $hlavnaFotka, $hlavnaNazov);
            $product->obrazok = 'storage/' . $hlavnaPath;
        }

        // Uloženie novej detailnej fotky (ak je nahratá)
        if ($request->hasFile('dopl_fotka')) {
            // Zmaž starý súbor, ak existuje
            if ($product->detail) {
                Storage::delete(str_replace('storage/', 'public/', $product->detail));
            }
            $detailFotka = $request->file('dopl_fotka');
            $detailNazov = uniqid() . '_' . $detailFotka->getClientOriginalName();
            $detailPath = Storage::putFileAs('public/pohare', $detailFotka, $detailNazov);
            $product->detail = 'storage/' . $detailPath;
        }

        $product->save();

        return redirect()->route('admin.menu')->with('success', 'Produkt bol upravený.');
    }

}

