<?php

use App\Http\Controllers\ProvaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidationController;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'pageTitle' => 'Homepage',
        'metaTitle' => 'Meta della Homepage'
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'pageTitle' => 'About',
        'metaTitle' => 'Meta della About page'
    ]);
});

Route::get('/post/{post}', function(Post $post){

    return view('posts.show', ['post' => $post]);
})->name('post.show');

Route::put('/post/{id}', function( Request $request, $id){
    $post = Post::findOrfail($id);

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();

    return redirect()->route('post.show', ['id' => $post->id])->with('success', 'Post aggiornato con successo');
})->name('post.update');

Route::delete('/post/{id}', function($id){
    $post = Post::findOrfail($id);

    $post->delete();

    return redirect()->route('post.index', ['id' => $post->id])->with('success', 'Post aggiornato con successo');
})->name('post.delete');

Route::post('/form', [ValidationController::class, 'validateForm'])->name('validateForm');

//______________________________________________________________

// Route per la registrazione
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegisterForm');
Route::post('/register', [UserController::class, 'register'])->name('registerUser');

// Route per il login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('showLoginForm');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

// Route per il logout
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser');

// Classico routing con GET, POST, PUT, PATCH, DELETE
//
//
// Route::get('/prova', [ProvaController::class, 'provaFunction']);


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
