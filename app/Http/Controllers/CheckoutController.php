<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
            'meno' => 'required|string|max:255',
            'priezvisko' => 'required|string|max:255',
            'ulica' => 'required|string|max:255',
            'mesto' => 'required|string|max:255',
            'psc' => 'required|string|max:10',
            'krajina' => 'required|string|in:Slovensko,Česko',
            'telefon' => 'required|string|max:20',
            'delivery' => 'required|in:kurier,odberne,osobny',
            'payment' => 'required|in:card,dobierka,paypal',
            'firma' => 'nullable|string|max:255',
            'predvolba' => 'nullable|string|max:10',
        ], [
            'required' => 'Pole :attribute je povinné.',
            'email' => 'Zadajte platnú e-mailovú adresu.',
            'max' => 'Pole :attribute nesmie byť dlhšie ako :max znakov.',
            'in' => 'Neplatná hodnota pre pole :attribute.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Spracuj objednávku...
        return redirect()->route('confirm')->with('success', 'Objednávka bola úspešne odoslaná.');
    }
}