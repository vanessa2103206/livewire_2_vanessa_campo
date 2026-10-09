<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleDelete extends Component
{
    public $article;

    public function deleteArticle()
    {
        if ($this->article->user_id == Auth::id()) {
            if ($this->article->img) {
                Storage::delete($this->article->img);
            }
            $this->article->delete();
            
            return redirect()->route('homepage')->with('successMessage', 'Articolo eliminato con successo!');
        }
    }

    public function render()
    {
        return view('livewire.article-delete');
    }
}
