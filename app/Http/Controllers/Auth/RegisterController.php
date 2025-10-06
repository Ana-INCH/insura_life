<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Asegúrate de tener la vista en resources/views/auth/register.blade.php
    }

    /**
     * Procesa el registro de un nuevo usuario.
     */
    public function register(Request $request)
    {
        // Validamos los datos de entrada
        $validatedData = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:8|confirmed',
        ]);

        // Creamos el nuevo usuario
        $user = User::create([
            'name'     => $validatedData['name'],
            'email'    => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Autenticamos al usuario recién registrado
        Auth::login($user);

        // Redirigimos al dashboard o a la URL deseada
        return redirect()->intended('/dashboard');
    }
}
