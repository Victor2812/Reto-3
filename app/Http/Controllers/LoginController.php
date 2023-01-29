<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    const AFTER_LOGIN_ROUTE = "dashboard";
    const AFTER_LOGOUT_ROUTE = "/";

    public function form() {
        if (Auth::check()) {
            // Si el usuario está autenticado redirigir a la página por defecto
            return redirect(self::AFTER_LOGIN_ROUTE);
        }

        return view('auth_test.login');
    }

    public function authenticate(Request $request)
    {
        // Validar los parámetros
        // El idioma de los errores se configura en lang/{idioma}/validation.php
        $request->validate([
            'dni' => 'required|max:9',
            'password' => 'required',
        ]);

        $dni = $request->dni;
        $password = $request->password;

        // Obtener la persona propietaria del usuario
        $persona = Person::where('dni', '=', $dni)->first();
        if (!$persona || !$persona->user) {
            return redirect()->back();
        }

        // Comprobar contraseña
        $user = $persona->user;
        if (!Hash::check($password, $user->password)) {
            return redirect()->back();
        }

        // Iniciar sesión y redirigir a la página por defecto
        Auth::login($user, false);
        return redirect(self::AFTER_LOGIN_ROUTE);
    }

    public function logout(Request $request)
    {
        // Cierra la sesión del usuario
        Auth::logout();
 
        // Invalida la sesión de PHP
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect(self::AFTER_LOGOUT_ROUTE);
    }
}
