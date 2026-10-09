<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accedi - Livewire CRUD</title>
    <style>
        body { font-family: sans-serif; background-color: #f8f9fa; display: flex; justify-content: center; align-items: center; min-height: 100vh; margin: 0; }
        .box-login { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border: 1px solid #dee2e6; width: 100%; max-width: 400px; }
        h1 { text-align: center; color: #212529; margin-bottom: 24px; font-size: 24px; }
        .campo-gruppo { margin-bottom: 16px; }
        label { display: block; font-weight: bold; margin-bottom: 6px; color: #495057; font-size: 14px; }
        input { width: 90%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px; font-size: 14px; }
        button { width: 95%; padding: 12px; background-color: #0d6efd; border: none; border-radius: 4px; font-weight: bold; color: white; cursor: pointer; font-size: 16px; margin-top: 10px; }
        button:hover { background-color: #0b5ed7; }
        .link-sotto { display: block; text-align: center; margin-top: 15px; color: #0d6efd; text-decoration: none; font-size: 14px; }
        .link-sotto:hover { text-decoration: underline; }
        .allerta-errore { background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 4px; border: 1px solid #f5c6cb; margin-bottom: 20px; font-size: 14px; }
        .allerta-errore ul { margin: 0; padding-left: 20px; }
    </style>
</head>
<body>

    <div class="box-login">
        <h1>🔑 Accedi al Blog</h1>
        
        <!-- MESSAGGIO DI ERRORE IN CASO DI ACCESSO FALLITO -->
        @if ($errors->any())
            <div class="allerta-errore">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/login" method="POST">
            @csrf
            <div class="campo-gruppo">
                <label for="email">Indirizzo Email</label>
                <input type="email" name="email" id="email" placeholder="esempio@email.com" value="{{ old('email') }}" required>
            </div>
            <div class="campo-gruppo">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Inserisci la password" required>
            </div>
            
            <button type="submit">Entra</button>
            
            <a href="{{ route('register') }}" class="link-sotto">Non hai un account? Registrati qui</a>
            <a href="{{ route('homepage') }}" class="link-sotto" style="color: #6c757d;">Torna alla Home</a>
        </form>
    </div>

</body>
</html>
