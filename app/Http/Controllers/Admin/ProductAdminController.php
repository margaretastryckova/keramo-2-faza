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

        return redirect()->route('admin.dashboard')->with('success', 'Produkt bol úspešne pridaný.');
    }
}


##cbdkdgkdsjdijadorobtit potom etse aj dalsie atributy ktore treva  pridat do databazy hahah neviem co mam pisat a kamo nech uz ide preco lebo fr neviem co mam robit ked tu stoji za chrbtom
##neviem co mam robit a este aj to ze sa mi to nezobrazuje v admin menu a neviem preco ako haha akoze
##este treba dorobit aj to ze chces uprait



// <?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Product;
// use Illuminate\Support\Str;

// class ProductAdminController extends Controller
// {
//     /**
//      * Zobrazí formulár na pridanie produktu
//      */
//     public function create()
//     {
//         return view('admin_add_product');
//     }

//     /**
//      * Uloží nový produkt do databázy
//      */
//     public function store(Request $request)
//     {
//         $validated = $request->validate([
//             'nazov' => 'required|string|max:255',
//             'kratky_popis' => 'required|string|max:500',
//             'detailny_popis' => 'required|string',
//             'cena' => 'required|numeric',
//             'kategoria' => 'required|string',
//             'hlavna_fotka' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
//             'dopl_fotky.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
//         ]);

//         // Uloženie hlavnej fotky
//         $hlavnaFotka = $request->file('hlavna_fotka');
//         $hlavnaNazov = uniqid() . '_' . $hlavnaFotka->getClientOriginalName();
//         $hlavnaFotka->move(public_path('pohare'), $hlavnaNazov);

//         // Uloženie doplnkových fotiek (voliteľne)
//         $doplFotkyPaths = [];
//         if ($request->hasFile('dopl_fotky')) {
//             foreach ($request->file('dopl_fotky') as $fotka) {
//                 if ($fotka) {
//                     $nazov = uniqid() . '_' . $fotka->getClientOriginalName();
//                     $fotka->move(public_path('pohare'), $nazov);
//                     $doplFotkyPaths[] = $nazov;
//                 }
//             }
//         }

//         // Vytvorenie produktu
//         Product::create([
//             'nazov' => $validated['nazov'],
//             'popis' => $validated['kratky_popis'],
//             'detail' => $validated['detailny_popis'],
//             'cena' => $validated['cena'],
//             'kategoria' => $validated['kategoria'],
//             'obrazok' => 'pohare/' . $hlavnaNazov,
//             'slug' => Str::slug($validated['nazov'] . '-' . Str::random(5)),
//             'farba' => null,
//             'rozmer' => null,
//             'objem' => null,
//         ]);

//         return redirect()->route('admin.dashboard')->with('success', 'Produkt bol úspešne pridaný.');
//     }

// }
