<?php
// Controller pre admin cast - sprava produktov (vytvorenie, editacia, mazanie)

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function create()
    {
        return view('admin_add_product');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin_edit_product', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produkt bol úspešne vymazaný.']);
    }
    // Uloženie produktu do databázy
    public function store(Request $request)
    {
        $request->validate([
            'nazov' => 'required|string|max:255',
            'popis' => 'required|string',
            'cena' => 'required|numeric',
            'obrazok' => 'required|image',
            'detail' => 'nullable|image',
            'objem' => 'nullable|string',
            'rozmer' => 'nullable|string',
            'kategoria' => 'nullable|string',
            'farba' => 'nullable|string',
        ]);

        //Ulozenie obrazkov do storage
        $obrazokPath = $request->file('obrazok')->store('products', 'public');
        $detailPath = $request->file('detail') ? $request->file('detail')->store('products', 'public') : null;
        // dd($obrazokPath);

        Product::create([
            'nazov' => $request->nazov,
            'popis' => $request->popis,
            'cena' => $request->cena,
            'obrazok' => $obrazokPath,
            'detail' => $detailPath,
            'objem' => $request->objem,
            'rozmer' => $request->rozmer,
            'slug' => $request->nazov . '-' . uniqid(),
            'kategoria' => $request->kategoria,
            'farba' => $request->farba,
        ]);

        return redirect()->route('admin.index')->with('success', 'Produkt bol úspešne pridaný.');
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'nazov' => 'required|string|max:255',
            'kratky_popis' => 'required|string',
            'cena' => 'required|numeric',
            'hlavna_fotka' => 'nullable|image',
            'dopl_fotka' => 'nullable|image',
            'objem' => 'nullable|string',
            'rozmer' => 'nullable|string',
            'kategoria' => 'nullable|string',
            'farba' => 'nullable|string',

        ]);
    
        if ($request->hasFile('hlavna_fotka')) {
            $product->obrazok = $request->file('hlavna_fotka')->store('products', 'public');
        }
    
        if ($request->hasFile('dopl_fotka')) {
            $product->detail = $request->file('dopl_fotka')->store('products', 'public');
        }
    
        $product->nazov = $request->nazov;
        $product->popis = $request->kratky_popis;
        $product->cena = $request->cena;
        $product->objem = $request->objem;
        $product->rozmer = $request->rozmer;
        $product->kategoria = $request->kategoria;
        $product->farba = $request->farba;
    
        $product->save();
    
        return redirect()->route('admin.index')->with('success', 'Produkt bol úspešne upravený.');
    }
    
}
