<div style="font-family: sans-serif; display: flex; justify-content: center; align-items: center; padding: 20px 0;">
    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #dee2e6; width: 100%; max-width: 500px;">
        <h2 style="text-align: center; color: #212529; margin-bottom: 24px; font-size: 24px;">🔧 Modifica il tuo articolo!</h2>

        <form wire:submit.prevent="articleUpdate">
            @csrf
            
            <!-- SEZIONE ERRORI DI VALIDAZIONE -->
            @if ($errors->any())
                <div style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; border: 1px solid #f5c6cb; margin-bottom: 20px; font-size: 14px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="margin-bottom: 16px;">
                <label for="title" style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px;">Nome Articolo:</label>
                <input type="text" id="title" wire:model.blur="title" style="width: 95%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label for="body" style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px;">Descrizione:</label>
                <textarea id="body" cols="30" rows="6" wire:model.blur="body" style="width: 95%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; resize: vertical;"></textarea>
            </div>

            <!-- VECCHIA IMMAGINE IN EVIDENZA -->
            <div style="margin-bottom: 16px; text-align: center;">
                <label style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px; text-align: left;">Vecchia immagine:</label>
                @if($article->img)
                    <img src="{{ Storage::url($article->img) }}" alt="Vecchia immagine" style="max-width: 150px; height: auto; border-radius: 4px; border: 1px solid #dee2e6; margin-top: 5px;">
                @else
                    <p style="color: #6c757d; font-size: 13px; font-style: italic;">Nessuna immagine precedentemente inserita</p>
                @endif
            </div>

            <div style="margin-bottom: 24px;">
                <label for="new_img" style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px;">Inserisci una nuova immagine (opzionale):</label>
                <input type="file" id="new_img" wire:model="new_img" style="width: 95%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; background-color: #fff;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 10px;">
                <button type="submit" style="width: 100%; padding: 12px; background-color: #ffc107; border: none; border-radius: 4px; font-weight: bold; color: #212529; cursor: pointer; font-size: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">Conferma Modifica</button>
                <a href="{{ route('homepage') }}" style="display: block; text-align: center; color: #6c757d; text-decoration: none; font-size: 14px; margin-top: 5px;">← Annulla e torna alla Home</a>
            </div>
        </form>
    </div>
</div>
