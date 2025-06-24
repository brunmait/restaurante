<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function inicio() {
        return view('inicio');
    }

    public function showLogin() {
        return view('login');
    }

    public function login(Request $request)
{
    if (Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();

        return match($user->rol) {
            'admin' => redirect()->route('admin'),
            'tecnico' => redirect()->route('tecnico'),
            'cajero' => redirect('/panel-cajero'),
            'dueno' => redirect('/panel-dueno'),
            default => redirect()->route('inicio')
        };
    }

    return back()->withErrors(['email' => 'Credenciales inválidas']);
}


    public function showRegistro() {
        return view('registro');
    }

   public function registro(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'rol' => 'required|in:admin,tecnico,cajero,dueno',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol' => $request->rol,
    ]);

    return redirect()->route('login')->with('success', 'Registrado correctamente');
}




    public function logout() {
        Auth::logout();
        return redirect()->route('inicio');
    }
}

