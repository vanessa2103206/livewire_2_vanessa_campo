<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class ArticleCreate extends Component
{
    // Abilita il caricamento dei file in Livewire richiesto dalla traccia
    use WithFileUploads;

    public $title;
    public $body;
    public $img;

    // Regole di validazione richieste dalla traccia dell'esercizio
    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:10',
        'img' => 'required|image|max:1024', // Massimo 1MB
    ];

    protected $messages = [
        'title.required' => 'Il titolo è obbligatorio.',
        'title.min' => 'Il titolo deve avere almeno 4 caratteri.',
        'body.required' => 'Il contenuto è obbligatorio.',
        'body.min' => 'La descrizione deve avere almeno 10 caratteri.',
        'img.required' => 'L\'immagine di copertina è obbligatoria.',
        'img.image' => 'Il file deve essere un\'immagine.',
    ];

    public function articleStore()
    {
        // Esegue la validazione dei campi prima di salvare
        $this->validate();

        // Salva l'immagine all'interno dello storage dei media
        $path = $this->img->store('public/articles');

        // Crea l'articolo sul database collegandolo all'utente loggato
        Article::create([
            'title' => $this->title,
            'body' => $this->body,
            'img' => $path,
            'user_id' => Auth::id(),
        ]);

        // Pulisce i campi del form
        $this->reset();

        // Messaggio di successo e reindirizzamento alla homepage
        return redirect()->route('homepage')->with('successMessage', 'Articolo creato con successo!');
    }

    public function render()
    {
        return view('livewire.article-create');
    }
}
