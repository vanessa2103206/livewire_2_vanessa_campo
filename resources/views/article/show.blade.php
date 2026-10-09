<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dettaglio Articolo</title>
    <style>
        body { font-family: sans-serif; background-color: #f8f9fa; margin: 0; padding: 0; }
        .barra-nav { background-color: #212529; padding: 15px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .nav-contenitore { max-width: 1000px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .nav-logo { color: #ffc107; font-weight: bold; text-decoration: none; font-size: 20px; }
        .nav-link { color: #f8f9fa; text-decoration: none; font-size: 15px; }
        
        .contenitore-show { max-width: 650px; margin: 40px auto; background: white; padding: 35px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #dee2e6; }
        h1 { color: #212529; font-size: 28px; margin-bottom: 5px; font-weight: bold; }
        .autore { color: #ffc107; font-weight: bold; background-color: #212529; display: inline-block; padding: 4px 10px; border-radius: 4px; font-size: 13px; margin-bottom: 20px; }
        .testo-articolo { color: #495057; font-size: 16px; line-height: 1.6; margin-bottom: 25px; white-space: pre-line; }
        .foto-show { width: 100%; height: 350px; object-fit: cover; border-radius: 6px; border: 1px solid #dee2e6; margin-bottom: 25px; }
        
        .botti-gruppo { display: flex; gap: 10px; align-items: center; border-top: 1px solid #dee2e6; padding-top: 20px; }
        .btn-torna { padding: 8px 18px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px; font-size: 14px; font-weight: bold; }
        .btn-modifica { padding: 8px 18px; background-color: #ffc107; color: #212529; text-decoration: none; border-radius: 4px; font-size: 14px; font-weight: bold; }
    </style>
</head>
<body>

    <!-- NAVBAR DI EMERGENZA -->
    <nav class="barra-nav">
        <div class="nav-contenitore">
            <a href="{{ route('homepage') }}" class="nav-logo">📝 LivewireCRUD</a>
            <a href="{{ route('homepage') }}" class="nav-link">← Torna alla Home</a>
        </div>
    </nav>

    <!-- SCHEDA DETTAGLIO -->
    <div class="contenitore-show">
        <h1>Dettagli dell'articolo: {{ $article->title }}</h1>
        <div class="autore">Scritto da: {{ $article->user->name ?? 'Autore Anonimo' }}</div>
        
        <!-- Foto in evidenza -->
        <img src="{{ $article->img ? Storage::url($article->img) : 'https://picsum.photos' }}" alt="Immagine di {{ $article->title }}" class="foto-show">
        
        <p class="testo-articolo">{{ $article->body }}</p>
        
        <div class="botti-gruppo">
            <a href="{{ route('homepage') }}" class="btn-torna">← Torna alla lista</a>
            
            @auth
                @if(Auth::id() == $article->user_id)
                    <a href="{{ route('article.edit', compact('article')) }}" class="btn-modifica">Modifica articolo</a>
                    @livewire('article-delete', compact('article'), key($article->id))
                @endif
            @endauth
        </div>
    </div>

</body>
</html>
