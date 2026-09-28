<div class="row justify-content-center mt-2">
    <div class="col-12 mb-4 text-center">
        <h2 class="fw-bold text-dark py-2" style="font-size: 32px; letter-spacing: -0.5px;">Tutti gli Articoli del Blog</h2>
        
        <!-- Banner rosso/arancione per la notifica di cancellazione -->
        @if (session()->has('successMessage'))
            <div style="background-color: #f8d7da; color: #842029; padding: 14px; border-radius: 8px; border: 1px solid #f5c2c7; text-align: center; font-weight: 700; max-width: 600px; margin: 15px auto; font-size: 15px;">
                💥 {{ session('successMessage') }}
            </div>
        @endif
    </div>

    <div class="d-flex flex-wrap gap-4 w-100 justify-content-center m-0">
        @forelse($articles as $article)
            <div style="background-color: #1e2229; color: white; border-radius: 14px; border: 1px solid rgba(255,188,0,0.25); overflow: hidden; box-shadow: 0 8px 20px rgba(0,0,0,0.15); display: flex; flex-direction: column; width: 100%; max-width: 400px; height: auto;">
                
                <!-- Box foto intera al 100% senza alcun taglio -->
                <div style="width: 100%; height: 240px; overflow: hidden; background-color: #11141a; display: flex; align-items: center; justify-content: center;">
                    <img src="{{ $article->img ? Storage::url($article->img) : 'https://picsum.photos' }}" style="width: 100%; height: 100%; object-fit: contain;" alt="Foto Articolo">
                </div>
                
                <div style="padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
                    <div>
                        <h5 style="color: #ffbc00; font-weight: 700; font-size: 22px; margin-bottom: 10px; letter-spacing: -0.5px;">{{ $article->title }}</h5>
                        <p style="color: #adb5bd; font-size: 15px; line-height: 1.6; margin-bottom: 20px; word-break: break-word;">{{ Str::limit($article->body, 120) }}</p>
                    </div>
                    
                    <!-- Doppi bottoni di Modifica ed Eliminazione richiesti dalla traccia -->
                    <div style="margin-top: 15px; border-top: 1px solid #2b303c; padding-top: 15px; display: flex; gap: 10px;">
                        <a href="/articolo/modifica/{{ $article->id }}" style="background-color: #ffbc00; color: #1e2229; font-weight: 700; border: none; padding: 10px; border-radius: 8px; width: 50%; text-align: center; text-decoration: none; font-size: 15px; box-shadow: 0 2px 4px rgba(255,188,0,0.2);">
                            ✏️ Modifica
                        </a>
                        <button wire:click="destroy({{ $article->id }})" wire:confirm="Sei sicura di voler eliminare questo articolo?" style="background-color: #dc3545; color: white; font-weight: 700; border: none; padding: 10px; border-radius: 8px; width: 50%; cursor: pointer; font-size: 15px;">
                            🗑️ Elimina
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center mt-4 w-100">
                <div style="background-color: white; padding: 40px; border-radius: 10px; border: 1px solid #dee2e6; box-shadow: 0 4px 6px rgba(0,0,0,0.02);">
                    <p style="font-size: 18px; color: #6c757d; margin: 0;">Non ci sono ancora articoli inseriti nel blog.</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
