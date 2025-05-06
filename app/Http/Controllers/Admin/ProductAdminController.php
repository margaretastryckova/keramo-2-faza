<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

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
            'dopl_fotky.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'objem' => 'nullable|string|max:255',
            'rozmer' => 'nullable|string|max:255',
            'farba' => 'nullable|string|max:255',
        ]);

        // Uloženie hlavnej fotky
        $hlavnaFotka = $request->file('hlavna_fotka');
        $hlavnaNazov = uniqid() . '_' . $hlavnaFotka->getClientOriginalName();
        $hlavnaFotka->move(public_path('pohare'), $hlavnaNazov);
        $hlavnaFotkaPath = 'pohare/' . $hlavnaNazov;

        // Uloženie doplnkových fotiek (voliteľne)
        $doplFotkyPaths = null;
        if ($request->hasFile('dopl_fotky')) {
            foreach ($request->file('dopl_fotky') as $fotka) {
                if ($fotka) {
                    $nazov = uniqid() . '_' . $fotka->getClientOriginalName();
                    $fotka->move(public_path('pohare'), $nazov);
                    $doplFotkyPaths[] = $nazov;

                    // if (!$detailPath) {
                    //     $detailPath = 'pohare/' . $nazov;
                    // }
                }
            }
        }
        // Uloženie produktu
        Product::create([
            'nazov' => $validated['nazov'],
            'popis' => $validated['kratky_popis'],
            'detail' => $detailPath ?? null,  
            'cena' => $validated['cena'],
            'kategoria' => $validated['kategoria'],
            'obrazok' => $hlavnaFotkaPath,
            'slug' => Str::slug($validated['nazov'] . '-' . Str::random(5)),
            'objem' => $validated['objem'],
            'rozmer' => $validated['rozmer'],
            'farba' => $validated['farba'],
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
        $validated = $request->validate([
            'nazov' => 'required|string|max:255',
            'kratky_popis' => 'required|string|max:500',
            'detailny_popis' => 'nullable|string',
            'cena' => 'required|numeric',
            'kategoria' => 'required|string',
            'hlavna_fotka' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dopl_fotky.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'objem' => 'nullable|string|max:255',
            'rozmer' => 'nullable|string|max:255',
            'farba' => 'nullable|string|max:255',
        ]);

        $product = Product::findOrFail($id);
        $product->nazov = $validated['nazov'];
        $product->popis = $validated['kratky_popis'];
        $product->detail = null;
        $product->cena = $validated['cena'];
        $product->kategoria = $validated['kategoria'];
        $product->objem = $validated['objem'];
        $product->rozmer = $validated['rozmer'];
        $product->farba = $validated['farba'];

        // Ak admin nahrá novú hlavnú fotku
        if ($request->hasFile('hlavna_fotka')) {
            $hlavnaFotka = $request->file('hlavna_fotka');
            $hlavnaNazov = uniqid() . '_' . $hlavnaFotka->getClientOriginalName();
            $hlavnaFotka->move(public_path('pohare'), $hlavnaNazov);
            $product->obrazok = 'pohare/' . $hlavnaNazov;
        }

        $product->save();

        return redirect()->route('admin.menu')->with('success', 'Produkt bol úspešne upravený.');
    }


}

