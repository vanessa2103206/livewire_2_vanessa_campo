<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Il costruttore rimosso perché le rotte sono già protette in web.php

    public function create()
    {
        return view('article.create');
    }

    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
}
