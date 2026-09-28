<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArticleCreate extends Component
{
    use WithFileUploads;

    public $title;
    public $body;
    public $img;

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'img' => 'nullable|image|max:1024',
    ];

    protected $messages = [
        'title.required' => 'Il titolo dell\'articolo è obbligatorio.',
        'title.min' => 'Il titolo deve contenere almeno 4 caratteri.',
        'body.required' => 'Il testo dell\'articolo è obbligatorio.',
        'body.min' => 'Il testo deve contenere almeno 10 caratteri.',
        'img.image' => 'Il file deve essere un\'immagine reale.',
        'img.max' => 'La foto non può superare 1MB.',
    ];

    public function articleStore()
    {
        $this->validate();

        $path = null;
        if ($this->img) {
            $path = $this->img->store('public/articles');
        }

        Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'img' => $path,
        ]);

        $this->reset(['title', 'body', 'img']);

        session()->flash('successMessage', 'Articolo inserito con successo nel blog!');
    }

    public function render()
    {
        return view('livewire.article-create');
    }
}
