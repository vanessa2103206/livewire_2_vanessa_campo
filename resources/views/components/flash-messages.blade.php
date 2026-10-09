<div>
    @if (session()->has('successMessage'))
        <div style="background-color: #d1e7dd; color: #0f5132; padding: 15px; border: 1px solid #badbcc; border-radius: 6px; margin: 20px auto; max-width: 800px; text-align: center; font-weight: bold; font-family: sans-serif;">
            <h3>{{ session('successMessage') }}</h3>
        </div>
    @endif
</div>
