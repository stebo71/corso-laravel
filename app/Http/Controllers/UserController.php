<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function showLoginForm()
    {
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

        event(new UserRegistered($user));

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

    public function uploadImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        if ($user->profile_image)
        {
            Storage::delete('public/'.$user->profile_image);
        }

        $path = $request->file('profile_image')->store('profile_images', 'public');


        $user->profile_image = $path;
        $user->save();

        return redirect()->route('home')->with('success', 'Immagine caricata correttamente');
    }

}
