<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAdminController extends Controller
{
    public function create()
    {
        return view('admin_menu');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Produkt bol úspešne vymazaný.']);
    }
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

        return redirect()->route('admin.products.create')->with('success', 'Produkt bol úspešne pridaný.');
    }
}
