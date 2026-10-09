<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire CRUD Blog</title>
    @livewireStyles
</head>
<body style="font-family: sans-serif; background-color: #f8f9fa; margin: 0; padding: 0;">

    <!-- 1. BARRA DI NAVIGAZIONE SCURA ED ELEGANTE -->
    <nav style="background-color: #212529; padding: 15px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
        <div style="max-width: 1000px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px;">
            <a href="{{ route('homepage') }}" style="color: #ffc107; font-weight: bold; text-decoration: none; font-size: 20px;">📝 LivewireCRUD</a>
            <ul style="list-style: none; display: flex; margin: 0; padding: 0; align-items: center;">
                <li><a href="{{ route('homepage') }}" style="color: #f8f9fa; text-decoration: none; font-size: 15px;">Home</a></li>
                @auth
                    <li style="margin-left: 20px;"><a href="{{ route('article.index') }}" style="color: #f8f9fa; text-decoration: none; font-size: 15px;">Tutti gli articoli</a></li>
                    <li style="margin-left: 20px;"><a href="{{ route('article.create') }}" style="color: #0dcaf0; text-decoration: none; font-size: 15px;">+ Nuovo Articolo</a></li>
                    <li style="margin-left: 20px;"><span style="color: #ffc107; font-size: 15px;">Ciao, <strong>{{ Auth::user()->name }}</strong> 👋</span></li>
                    <li style="margin-left: 20px;">
                        <form action="/logout" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" style="background: none; border: 1px solid #dc3545; color: #dc3545; padding: 6px 15px; border-radius: 4px; cursor: pointer; font-size: 14px;">Logout</button>
                        </form>
                    </li>
                @else
                    <li style="margin-left: 20px;"><a href="{{ route('login') }}" style="border: 1px solid #f8f9fa; padding: 6px 15px; border-radius: 4px; color: white; text-decoration: none; font-size: 15px;">Accedi</a></li>
                    <li style="margin-left: 20px;"><a href="{{ route('register') }}" style="background-color: #ffc107; color: #212529; padding: 6px 15px; border-radius: 4px; font-weight: bold; text-decoration: none; font-size: 15px;">Registrati</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- 2. NOTIFICHE FLASH DI SUCCESSO E ERRORE STRUTTURATE COME DA VIDEO -->
    <x-flash-messages />

    <!-- 3. CONTENUTI DINAMICI DELLE PAGINE -->
    <main>
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>
