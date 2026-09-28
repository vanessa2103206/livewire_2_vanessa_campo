<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ArticleCreate;
use App\Livewire\ArticleIndex;

// Homepage standard
Route::get('/', function () {
    return view('welcome');
});

// Nuovo Inserimento (Create/Store)
Route::get('/articolo/nuovo', function () {
    return view('welcome')->with('component', 'article-create');
});

// Lista di tutti gli articoli (Index/Destroy)
Route::get('/articoli', function () {
    return view('welcome')->with('component', 'article-index');
});

// Modifica articolo (Edit/Update)
Route::get('/articolo/modifica/{article}', function ($article) {
    return view('welcome')->with(['component' => 'article-edit', 'article' => $article]);
});
