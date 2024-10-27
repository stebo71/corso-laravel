<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});



// Classico routing con GET, POST, PUT, PATCH, DELETE
//
//
// Route::get('/prova', function () {
//     return view('welcome');
// });

// Route::post('/submit-form', function () {
//     return '<h1>Form inviato</h1>';
// });

// Route::put('/update-item', function () {
//     return '<h1>Elemento aggiornato!</h1>';
// });

// Route::patch('/update-item', function () {
//     return '<h1>Elemento parzialmente aggiornato!</h1>';
// });

// Route::delete('/delete-item', function () {
//     return '<h1>Elemento eliminato!</h1>';
// });




// Gestire TUTTE le chiamate
//
//
// Route::any('/prova', function () {
//     return '<h1>Questa route risponde a qualsiasi metodo HTTP!</h1>';
// });




// Chiamate con un PREFISSO
//
//
// Route::prefix('admin')->group(function () {
//     Route::get('/users', function () {
//         return '<h1>Gestione utenti</h1>';
//     });

//     Route::get('/settings', function () {
//         return '<h1>Impostazioni di amministrazione</h1>';
//     });
// });




// Route NOMINATE
//
//

// Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
