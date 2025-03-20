<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Livewire</title>
    @livewireStyles
    @vite('resources/css/app.css')
</head>
<body>
<header>
    <nav class="bg-blue-500 h-20 flex">
        <ul class="flex gap-10 ml-10 mt-6">
            <li><a class="font-bold text-white" href="/">Accueil</a></li>
            <li><a href="/rsa-key-generation" class="text-white">Génération de clé RSA</a></li>
            <li><a href="/hash-text" class="text-white">Hasher un texte</a></li>
            <!-- only if connected -->
            @if(Auth::check())
            <li><a href="/wallet" class="text-white">Portefeuille</a></li>
            <li><a href="/logout" class="text-white">Déconnexion</a></li>
            @else
            <li><a href="/login" class="text-white">Connexion</a></li>
            <li><a href="/register" class="text-white">Inscription</a></li>
            @endif

        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
@livewireScripts
</body>
</html>
