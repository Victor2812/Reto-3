<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function form() {
        // Comprobar que el usuairo ya está autenticado
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $dni = $request->dni;
        $password = $request->password; // "admin"

        $persona = Person::where('dni', '=', $dni)->first();

        if (!$persona || !$persona->user) {
            return redirect()->back();
        }

        $user = $persona->user;

        if (!Hash::check($password, $user->password)) {
            return redirect()->back();
        }

        Auth::login($user, false);

        return redirect('dashboard');

        //if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            // The user is being remembered...
        //}
    }
}
