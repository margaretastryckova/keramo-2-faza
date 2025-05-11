<?php

//spracovanie prihlasenia, odhlasenia a presmerovania pouzivatela, spracovanie admina

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Zavolanie metody na prenesenie session košíka a presmerovanie
            return $this->authenticated($request, Auth::user());
        }

        return back()->withErrors([
            'email' => 'Nesprávny e-mail alebo heslo.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function showProfile()
    {
        return view('auth.profil');
    }

    
     //Prenos session košíka do DB po prihlásení + presmerovanie podľa typu používateľa
    protected function authenticated(Request $request, $user)
    {
        // Prenos session košíka do DB
        $sessionCart = session('cart', []);
        foreach ($sessionCart as $item) {
            $cartItem = CartItem::firstOrNew([
                'user_id' => $user->id,
                'product_id' => $item['id'],
            ]);
            $cartItem->quantity += $item['quantity'];
            $cartItem->save();
        }

        session()->forget('cart');

        //  Presmerovanie podľa typu používateľa
        if ($user->is_admin) {
            return redirect()->route('admin.index');
        }

        return redirect()->route('profile');
    }
}
