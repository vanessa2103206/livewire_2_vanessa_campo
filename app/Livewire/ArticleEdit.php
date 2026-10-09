<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArticleEdit extends Component
{
    use WithFileUploads;

    public $article;
    public $title;
    public $body;
    public $img;
    public $old_img;

    public function articleUpdate()
    {
        $this->article->update([
            'title' => $this->title,
            'body' => $this->body
        ]);

        if ($this->img) {
            $this->article->update([
                'img' => $this->img->store('public/img')
            ]);

            if ($this->old_img) {
                Storage::delete($this->old_img);
            }
            $this->reset('img');
        }

        return redirect()->route('homepage')->with('successMessage', 'Articolo modificato con successo!');
    }

    public function mount()
    {
        $this->title = $this->article->title;
        $this->body = $this->article->body;
        $this->old_img = $this->article->img;
    }

    public function render()
    {
        return view('livewire.article-edit');
    }
}
