<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire CRUD Articles - Vanessa Campo</title>
    
    <!-- Link universale diretto di Bootstrap 5 per attivare la grafica -->
    <link rel="stylesheet" href="https://jsdelivr.net">
    
    @livewireStyles
</head>
<body class="bg-light">

    <!-- Navbar scura ed elegante di Bootstrap 5 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand text-warning fw-bold fs-4" href="/">Blog Livewire 2</a>
            <div class="d-flex gap-3">
                <a class="nav-link text-white fw-semibold px-2 py-1 align-self-center text-decoration-none" href="/">Homepage</a>
                <a class="nav-link text-white fw-semibold px-2 py-1 align-self-center text-decoration-none" href="/articoli">Tutti gli Articoli</a>
                <a class="btn btn-warning text-dark fw-bold btn-sm px-3 ms-2" href="/articolo/nuovo">Scrivi Articolo</a>
            </div>
        </div>
    </nav>

    <!-- Contenitore centrale di Bootstrap -->
    <main class="container">
        {{ $slot }}
    </main>

    @livewireScripts
    <script src="https://jsdelivr.net"></script>
</body>
</html>
