<?php

//registracia noveho pouzivatela a validacia vstupov

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());


        return redirect()->route('login')->with('success', 'Registrácia bola úspešná. Prosím, prihláste sa.');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'meno' => ['required', 'string', 'max:255'],
            'priezvisko' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'heslo' => ['required', 'string', 'min:8', 'confirmed'],
            'oslovenie' => ['required', 'in:pani,pan,ine,nezadavat'],
            'newsletter' => ['nullable', 'boolean'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['meno'] . ' ' . $data['priezvisko'],
            'email' => $data['email'],
            'password' => Hash::make($data['heslo']),
            'oslovenie' => $data['oslovenie'],
            'newsletter' => isset($data['newsletter']) ? true : false,
        ]);
    }
}