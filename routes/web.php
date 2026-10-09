<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// 1. Rotta per la Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// 2. Schermate di visualizzazione (GET) per Login e Registrazione
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// 3. Rotta di salvataggio per la Registrazione (POST)
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string',
    ], [
        'email.unique' => 'Questa email è già registrata nel nostro sistema.',
        'email.email' => 'Inserisci un indirizzo email valido.',
        '*.required' => 'Questo campo è obbligatorio.'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Cripta la password correttamente nel DB
    ]);

    Auth::login($user);

    return redirect()->route('homepage');
});

// 4. Rotta di autenticazione per il Login (POST) - CORRETTA E TRASPARENTE
Route::post('/login', function (Request $request) {
    // Valida i campi inseriti nel form
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'Il campo email è obbligatorio.',
        'email.email' => 'Inserisci un formato email valido.',
        'password.required' => 'Il campo password è obbligatorio.'
    ]);

    // Tenta l'autenticazione reale contro il database
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('homepage'); // Se ha successo va in Homepage
    }

    // Se fallisce, torna indietro mostrando l'errore visibile sopra il form
    return back()->withErrors([
        'error_login' => 'Le credenziali inserite (Email o Password) non sono corrette.',
    ])->withInput($request->only('email'));
});

// 5. Rotta per il Logout (POST)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('homepage');
})->name('logout');

// 6. Rotte del CRUD degli articoli protette dal Login
Route::middleware(['auth'])->group(function () {
    Route::get('/articolo/nuovo', [ArticleController::class, 'create'])->name('article.create');
    Route::get('/articoli', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
});
