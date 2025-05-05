<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('profile');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Zavoláme metódu na prenesenie session košíka do DB
            $this->authenticated($request, Auth::user());

            return redirect()->route('profile');
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

    /**
     * Prenos session košíka do DB po prihlásení
     */
    protected function authenticated(Request $request, $user)
    {
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
    }
}
