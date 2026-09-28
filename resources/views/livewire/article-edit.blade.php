<div>
    <h2 class="text-center mb-4 fw-bold" style="color: #ffbc00;">Modifica il tuo articolo</h2>

    @if (session()->has('successMessage'))
        <div style="background-color: #d1e7dd; color: #0f5132; padding: 14px; border-radius: 8px; border: 1px solid #badbcc; text-align: center; font-weight: 700; margin-bottom: 25px; font-size: 15px;">
            ✅ {{ session('successMessage') }}
        </div>
    @endif

    <form wire:submit.prevent="articleUpdate" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" style="color: #ffbc00;">Titolo dell'Articolo</label>
            <input type="text" wire:model="title" class="form-control">
            @error('title') <span class="text-danger small fw-bold d-block" style="margin-top: -15px; margin-bottom: 15px;">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" style="color: #ffbc00;">Descrizione</label>
            <textarea wire:model="body" rows="5" class="form-control"></textarea>
            @error('body') <span class="text-danger small fw-bold d-block" style="margin-top: -15px; margin-bottom: 15px;">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="form-label" style="color: #ffbc00;">Sostituisci l'immagine (Opzionale)</label>
            <input type="file" wire:model="new_img" class="form-control">
            @error('new_img') <span class="text-danger small fw-bold d-block" style="margin-top: -15px; margin-bottom: 15px;">{{ $message }}</span> @enderror

            @if ($new_img)
                <div class="mt-3 text-center">
                    <p class="text-muted small">Anteprima della nuova foto:</p>
                    <img src="{{ $new_img->temporaryUrl() }}" style="max-height: 150px; border-radius: 8px; border: 2px solid #ffbc00; object-fit: cover; width: 100%; max-width: 250px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-warning w-100 py-2">Aggiorna Articolo</button>
    </form>
</div>
