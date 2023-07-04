<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

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

        $user = User::where('email', $credentials['email'])->first();

        if ($user && \Hash::check($credentials['password'], $user->password)) {
            // Las credenciales son válidas
            session()->put('message', 'Inicio de sesión exitoso.'); // Agrega la sesión con el mensaje de éxito
            return view('layouts.index');
        } else {
            session()->put('message', 'Las credenciales proporcionadas son incorrectas.');
            // Las credenciales son inválidas
            return back()->withErrors([
                'email' => 'Las credenciales proporcionadas son incorrectas.',
            ]);
        }
    }


}
