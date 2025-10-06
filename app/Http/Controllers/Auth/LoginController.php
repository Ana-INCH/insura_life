<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de tener la vista en resources/views/auth/login.blade.php
    }

    /**
     * Procesa el inicio de sesión falso, para pruebas.
     */
    public function fakeLogin(Request $request)
    {
        // Validamos los datos de entrada
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Autenticamos al usuario con los datos proporcionados
        Auth::loginUsingId(1);

        // Redirigimos al dashboard o a la url a la que el usuario pretendía acceder
        return redirect()->intended('dashboard');
    }

    /**
     * Procesa el inicio de sesión.
     */
    public function login(Request $request)
    {
        // Validamos los datos de entrada
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Intentamos autenticar al usuario
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirigimos al dashboard o a la url a la que el usuario pretendía acceder
            return redirect()->intended('dashboard');
        }

        // Si las credenciales son incorrectas, redirigimos de vuelta con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no son correctas.',
        ])->onlyInput('email');
    }

    /**
     * Cierra la sesión del usuario.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
