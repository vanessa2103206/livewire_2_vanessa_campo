<div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 25px; padding: 20px 0;">
    @if($articles->isEmpty())
        <p style="color: #6c757d; font-style: italic;">Non ci sono ancora articoli pubblicati.</p>
    @else
        @foreach ($articles as $article)
            <!-- Aumentata la larghezza a 320px per far stare comodamente le foto e i testi -->
            <div style="background: white; border: 1px solid #dee2e6; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); width: 320px; overflow: hidden; display: flex; flex-direction: column;">
                
                <!-- Immagine dell'articolo con recupero dallo Storage -->
                <img src="{{ $article->img ? Storage::url($article->img) : 'https://picsum.photos' }}" alt="Immagine di {{ $article->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                
                <div style="padding: 20px; display: flex; flex-direction: column; flex-grow: 1;">
                    <h5 style="margin: 0 0 10px 0; font-size: 18px; color: #212529; font-weight: bold;">{{ $article->title }}</h5>
                    <p style="margin: 0 0 20px 0; font-size: 14px; color: #6c757d; line-height: 1.4;">{{ Str::limit($article->body, 80) }}</p>
                    
                    <!-- Pulsanti del CRUD ridisegnati in linea per non tagliare la card -->
                    <div style="margin-top: auto; display: flex; justify-content: space-between; align-items: center; gap: 8px;">
                        <!-- 1. Vedi -->
                        <a href="{{ route('article.show', compact('article')) }}" style="padding: 6px 10px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 4px; font-size: 12px; text-align: center; flex-grow: 1; font-weight: bold;">Vedi</a>
                        
                        @auth
                            @if(Auth::id() == $article->user_id)
                                <!-- 2. Modifica -->
                                <a href="{{ route('article.edit', compact('article')) }}" style="padding: 6px 10px; background-color: #ffc107; color: #212529; text-decoration: none; border-radius: 4px; font-size: 12px; text-align: center; font-weight: bold; flex-grow: 1;">Modifica</a>
                                
                                <!-- 3. Elimina (Componente Livewire) con stile allineato -->
                                <div style="flex-grow: 1;">
                                    @livewire('article-delete', compact('article'), key($article->id))
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
