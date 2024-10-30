<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function validateForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'age' => 'required|integer|min:18|max:100',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Se la validazione passa, puoi continuare con la logica
        return redirect()->route('home')->with('success', 'Dati valiati con successo');
    }
}
