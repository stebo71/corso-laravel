<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
        $pageTitle = 'Login Page';
        $pageMeta = 'Meta description for login page';
        return view('login');
    }

    public function register(Request $resquest)
    {
        $validateData = $resquest->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
        ]);

        Auth::login($user);

        return redirect()->route('showRegisterForm')->with('success', 'Registrazione avvenuta con successo! Sei stato loggato automaticamente.');
    }

    //______________________________________________________
    //                      Login
    //______________________________________________________

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/')->with('success', 'Login effettuato con successo.');
        }

        return back()->withErrors([
            'email' => 'Le credenziali fornite non sono corrette.',
        ])->onlyInput('email');
    }


    //______________________________________________________
    //                      Logout
    //______________________________________________________
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout effettuato correttamente!');
    }
}
