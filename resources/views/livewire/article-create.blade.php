<div style="font-family: sans-serif; display: flex; justify-content: center; align-items: center; padding: 20px 0;">
    <div style="background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #dee2e6; width: 100%; max-width: 500px;">
        <h2 style="text-align: center; color: #212529; margin-bottom: 24px; font-size: 24px;">📝 Inserisci un nuovo articolo</h2>

        <form wire:submit.prevent="articleStore">
            @csrf
            
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
                <label for="title" style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px;">Titolo Articolo:</label>
                <!-- Aggiunto .blur per blindare il testo -->
                <input type="text" id="title" wire:model.blur="title" placeholder="Inserisci il titolo" style="width: 95%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px;">
            </div>

            <div style="margin-bottom: 16px;">
                <label for="body" style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px;">Descrizione / Contenuto:</label>
                <!-- Aggiunto .blur per blindare la descrizione -->
                <textarea id="body" cols="30" rows="6" wire:model.blur="body" placeholder="Scrivi il contenuto dell'articolo..." style="width: 95%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; resize: vertical;"></textarea>
            </div>

            <div style="margin-bottom: 24px;">
                <label for="img" style="display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px;">Immagine di copertina:</label>
                <input type="file" id="img" wire:model="img" style="width: 95%; padding: 8px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; background-color: #fff;">
            </div>

            <div style="display: flex; flex-direction: column; gap: 10px;">
                <button type="submit" style="width: 100%; padding: 12px; background-color: #0d6efd; border: none; border-radius: 4px; font-weight: bold; color: white; cursor: pointer; font-size: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">Pubblica Articolo</button>
                <a href="{{ route('homepage') }}" style="display: block; text-align: center; color: #6c757d; text-decoration: none; font-size: 14px; margin-top: 5px;">← Annulla e torna alla Home</a>
            </div>
        </form>
    </div>
</div>
