<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Livewire - Vanessa Campo</title>
    
    <link rel="stylesheet" href="https://jsdelivr.net">
    
    <style>
        body { background-color: #f4f6f9 !important; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .bg-dark { background-color: #1e2229 !important; }
        .text-warning { color: #ffbc00 !important; }
        
        .navbar-custom { background-color: #1e2229; padding: 18px 0; box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .navbar-container { max-width: 1140px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; }
        .nav-links a { color: #f8f9fa; text-decoration: none; margin-right: 25px; font-weight: 600; font-size: 15px; transition: color 0.2s; }
        .nav-links a:hover { color: #ffbc00; }
        
        .btn-warning { background-color: #ffbc00 !important; color: #1e2229 !important; font-weight: 700; border: none; padding: 8px 20px; border-radius: 6px; text-decoration: none; box-shadow: 0 2px 6px rgba(255,188,0,0.3); transition: all 0.2s; display: inline-block; }
        .btn-warning:hover { transform: translateY(-1px); box-shadow: 0 4px 10px rgba(255,188,0,0.4); }
        
        .card-dark { background-color: #1e2229 !important; color: white !important; padding: 35px; border-radius: 14px; border: 1px solid rgba(255,188,0,0.3); max-width: 650px; margin: 40px auto; box-shadow: 0 10px 25px rgba(0,0,0,0.2); }
        .form-label { font-weight: 600; font-size: 15px; margin-bottom: 8px; display: block; }
        
        .form-control { background-color: #2b303c !important; color: white !important; border: 1px solid #454d5e !important; border-radius: 8px; padding: 12px; width: 100%; box-sizing: border-box; display: block; margin-top: 5px; margin-bottom: 20px; transition: border-color 0.2s; }
        .form-control:focus { border-color: #ffbc00 !important; outline: none; box-shadow: 0 0 0 3px rgba(255,188,0,0.15); }
        
        input[type="file"].form-control { padding: 10px; color: #adb5bd; }
        .main-container { max-width: 1140px; margin: 0 auto; padding: 0 20px; }
    </style>
    
    @livewireStyles
</head>
<body>

    <nav class="navbar-custom">
        <div class="navbar-container">
            <a href="/" style="color: #ffbc00; text-decoration: none; font-weight: 800; font-size: 24px; letter-spacing: -0.5px;">🐘 Blog Livewire 2</a>
            <div class="nav-links d-flex align-items-center">
                <a href="/">Homepage</a>
                <a href="/articoli">Tutti gli Articoli</a>
                <a class="btn btn-warning" href="/articolo/nuovo">✍️ Scrivi Articolo</a>
            </div>
        </div>
    </nav>

    <main class="main-container mt-4">
        @if(isset($component) && $component == 'article-create')
            <div class="card-dark">
                @livewire('article-create')
            </div>
        @elseif(isset($component) && $component == 'article-index')
            <div class="py-4">
                @livewire('article-index')
            </div>
        @elseif(isset($component) && $component == 'article-edit')
            <div class="card-dark">
                @livewire('article-edit', ['article' => $article])
            </div>
        @else
            <div style="text-align: center; margin-top: 60px; background-color: white; padding: 60px 40px; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.04); border: 1px solid #e9ecef;">
                <h1 style="font-size: 42px; font-weight: 800; color: #1e2229; margin-bottom: 20px; letter-spacing: -1px;">Esercizio CRUD Livewire 2</h1>
                <p style="font-size: 18px; color: #6c757d; max-width: 700px; margin: 0 auto 35px auto; line-height: 1.6;">Benvenuta nell'applicazione per la gestione degli articoli del blog completo di immagini e validazioni in tempo reale realizzato da Vanessa Campo.</p>
                <div style="display: flex; justify-content: center; gap: 20px;">
                    <a href="/articolo/nuovo" class="btn btn-warning" style="font-size: 16px; padding: 12px 30px;">Inizia a scrivere</a>
                    <a href="/articoli" class="btn btn-warning" style="background-color: #1e2229 !important; color: white !important; font-size: 16px; padding: 12px 30px;">Vedi articoli</a>
                </div>
            </div>
        @endif
    </main>

    @livewireScripts
    <script src="https://jsdelivr.net"></script>
</body>
</html>
