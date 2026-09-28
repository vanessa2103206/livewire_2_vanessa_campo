<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ArticleIndex extends Component
{
    public function destroy(Article $article)
    {
        if ($article->img) {
            Storage::delete($article->img);
        }

        $article->delete();

        session()->flash('successMessage', 'Articolo eliminato con successo!');
    }

    public function render()
    {
        $articles = Article::all();
        return view('livewire.article-index', compact('articles'));
    }
}
