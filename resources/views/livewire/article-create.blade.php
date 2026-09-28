<div>
    <h2 class="text-center mb-4 fw-bold" style="color: #ffbc00;">Inserisci il tuo articolo!</h2>

    <!-- Banner verde di successo visibile all'istante -->
    @if (session()->has('successMessage'))
        <div style="background-color: #d1e7dd; color: #0f5132; padding: 14px; border-radius: 8px; border: 1px solid #badbcc; text-align: center; font-weight: 700; margin-bottom: 25px; font-size: 15px;">
            ✅ {{ session('successMessage') }}
        </div>
    @endif

    <form wire:submit.prevent="articleStore" enctype="multipart/form-data">
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
            <label class="form-label" style="color: #ffbc00;">Inserisci una immagine</label>
            <input type="file" wire:model="img" class="form-control">
            @error('img') <span class="text-danger small fw-bold d-block" style="margin-top: -15px; margin-bottom: 15px;">{{ $message }}</span> @enderror

            @if ($img)
                <div class="mt-3 text-center">
                    <p class="text-muted small">Anteprima della foto selezionata:</p>
                    <img src="{{ $img->temporaryUrl() }}" style="max-height: 150px; border-radius: 8px; border: 2px solid #ffbc00; object-fit: cover; width: 100%; max-width: 250px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-warning w-100 py-2">Salva Articolo</button>
    </form>
</div>
