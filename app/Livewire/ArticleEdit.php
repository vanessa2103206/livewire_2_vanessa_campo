<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ArticleEdit extends Component
{
    // Abilitiamo il caricamento dei file per la modifica
    use WithFileUploads;

    public Article $article;
    public $title;
    public $body;
    public $new_img;

    // Regole di validazione per la modifica richieste dalla traccia
    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'new_img' => 'nullable|image|max:1024',
    ];

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio.',
        'title.min' => 'Il titolo deve contenere almeno 4 caratteri.',
        'body.required' => 'La descrizione è obbligatoria.',
        'body.min' => 'La descrizione deve contenere almeno 10 caratteri.',
        'new_img.image' => 'Il file deve essere un\'immagine reale.',
        'new_img.max' => 'La nuova foto non può superare 1MB.',
    ];

    // Riattiviamo i vecchi dati nelle caselle di testo
    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $article->title;
        $this->body = $article->body;
    }

    // Funzionalità UPDATE richiesta dalla traccia
    public function articleUpdate()
    {
        $this->validate();

        // Se l'utente decide di cambiare la foto dell'articolo
        if ($this->new_img) {
            // Cancelliamo la vecchia immagine dal disco fisso
            if ($this->article->img) {
                Storage::delete($this->article->img);
            }
            // Salviamo la nuova immagine nello storage
            $path = $this->new_img->store('public/articles');
            $this->article->img = $path;
        }

        // Salviamo le modifiche nel database reale
        $this->article->update([
            'title' => $this->title,
            'body' => $this->body,
            'img' => $this->article->img,
        ]);

        session()->flash('successMessage', 'Articolo modificato con successo nel blog!');
    }

    public function render()
    {
        return view('livewire.article-edit');
    }
}
