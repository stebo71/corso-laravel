<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvaController extends Controller
{
    public function provaFunction()
    {
        $calcolo = 5+7;
        return $calcolo;
    }
    public function provaData(Request $request)
    {
        echo 'questa è la richiesta: '.$request.'         ';
        return 'Dati ricevuti: ' . $request->input('data');
    }
}
