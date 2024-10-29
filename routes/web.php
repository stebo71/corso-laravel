<?php

use App\Http\Controllers\ProvaController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'pageTitle' => 'Homepage',
        'metaTitle' => 'Meta della Homepage'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'pageTitle' => 'About',
        'metaTitle' => 'Meta della About page'
    ]);
});


Route::get('/prova', [ProvaController::class, 'provaFunction']);
Route::post('/test-form', [ProvaController::class, 'provaData']);

Route::get('/posts', function () {
    //Recupera tutti i posts
    $post = Post::all();

    //Mostra tutti i posts
    return view('posts.index', ['posts'=>$post]);
})->name('posts.index');

Route::get('/posts/create', function(){
    //Crea un nuovo post con dati fittizi
    $post = Post::create([
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    //Mostra un messaggio di conferma con l'ID del post creato
    return view('posts.create', ['post' => $post]);
})->name('posts.create');

Route::get('/posts/delete/{id}', function($id){
    //Recupera e elimina il post con l'ID specificato
    $post = Post::find($id);

    if ($post){
        $post->delete();
        $message = "Il post con ID $id è stato cancellato.";
    }else{
        $message = "Il post con ID $id NON è stato trovato.";
    }

    //Mostra messaggio di conferma dell'eliminazione
    return view('posts.delete', ['message' => $message]);
})->name('posts.delete');

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
