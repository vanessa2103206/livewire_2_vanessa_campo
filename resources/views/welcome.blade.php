<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire CRUD Blog</title>
    <!-- Stile interno autonomo per la Homepage e le Card -->
    <style>
        body { font-family: sans-serif; background-color: #f8f9fa; margin: 0; padding: 0; }
        
        /* Stile della Navbar superiore */
        .barra-nav { background-color: #212529; padding: 15px 0; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .nav-contenitore { max-width: 1000px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 20px; }
        .nav-logo { color: #ffc107; font-weight: bold; text-decoration: none; font-size: 20px; }
        .nav-menu { list-style: none; display: flex; margin: 0; padding: 0; align-items: center; }
        .nav-item { margin-left: 20px; }
        .nav-link { color: #f8f9fa; text-decoration: none; font-size: 15px; }
        .nav-link:hover { color: #ffc107; }
        .btn-nav-acc { border: 1px solid #f8f9fa; padding: 6px 15px; border-radius: 4px; }
        .btn-nav-reg { background-color: #ffc107; color: #212529; padding: 6px 15px; border-radius: 4px; font-weight: bold; }
        .btn-nav-reg:hover { background-color: #e0a800; }
        .btn-logout { background: none; border: 1px solid #dc3545; color: #dc3545; padding: 6px 15px; border-radius: 4px; cursor: pointer; }
        .btn-logout:hover { background-color: #dc3545; color: white; }

        /* Stile della sezione centrale */
        .hero-sezione { max-width: 800px; margin: 40px auto 20px auto; background: white; padding: 45px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #dee2e6; text-align: center; }
        h1 { color: #212529; font-size: 36px; margin-bottom: 15px; }
        .sottotitolo { color: #6c757d; font-size: 18px; margin-bottom: 30px; line-height: 1.6; }
        .linea { max-width: 150px; border: 0; height: 1px; background: #dee2e6; margin: 20px auto; }
        .bottone-scrivi { display: inline-block; padding: 12px 30px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 4px; font-weight: bold; font-size: 16px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); border: none; cursor: pointer; }
        .bottone-scrivi:hover { background-color: #0b5ed7; }

        /* Stile della griglia degli articoli inferiore */
        .sezione-articoli { max-width: 900px; margin: 40px auto; padding: 0 20px; }
        .titolo-sezione { font-size: 24px; color: #212529; margin-bottom: 20px; font-weight: bold; text-align: center; }
    </style>
    @livewireStyles
</head>
<body>

    <!-- 1. BARRA DI NAVIGAZIONE SCURA ED ELEGANTE -->
    <nav class="barra-nav">
        <div class="nav-contenitore">
            <a href="{{ route('homepage') }}" class="nav-logo">📝 LivewireCRUD</a>
            <ul class="nav-menu">
                <li><a href="{{ route('homepage') }}" class="nav-link">Home</a></li>
                @auth
                    <li class="nav-item"><a href="{{ route('article.index') }}" class="nav-link">Tutti gli articoli</a></li>
                    <li class="nav-item"><a href="{{ route('article.create') }}" class="nav-link text-info">+ Nuovo Articolo</a></li>
                    <li class="nav-item"><span class="nav-link" style="color: #ffc107;">Ciao, <strong>{{ Auth::user()->name }}</strong> 👋</span></li>
                    <li class="nav-item">
                        <form action="/logout" method="POST" style="margin: 0;">
                            @csrf
                            <button type="submit" class="btn-logout">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link btn-nav-acc">Accedi</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link btn-nav-reg">Registrati</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- 2. PANNELLO CENTRALE GRAFICO ALLINEATO ALLA TRACCIA -->
    <div class="hero-sezione">
        <h1>Benvenuta nel tuo Blog Livewire! 🚀</h1>
        <p class="sottotitolo">L'applicazione CRUD completa con caricamento immagini e relazioni utente è attiva e configurata al 100% sul tuo computer locale.</p>
        <div class="linea"></div>
        
        <div style="margin-top: 30px;">
            @auth
                <a href="{{ route('article.create') }}" class="bottone-scrivi">Inizia a scrivere</a>
            @else
                <p style="color: #6c757d; margin-bottom: 20px; font-size: 15px;">Accedi o registrati per inserire i tuoi articoli nel blog.</p>
                <a href="{{ route('login') }}" class="bottone-scrivi">Inizia a scrivere</a>
            @endauth
        </div>
    </div>

    <!-- 3. SEZIONE INFERIORE CHE INIETTA L'ELENCO COMPLETO DEGLI ARTICOLI -->
    <div class="sezione-articoli">
        <h2 class="titolo-sezione">📚 Elenco degli Articoli Pubblicati</h2>
        @livewire('article-index')
    </div>

    @livewireScripts
</body>
</html>
