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
@livewireScripts
@stack('scripts')
<header>
    <nav class="bg-blue-500 h-20 flex">
        <ul class="flex gap-10 ml-10 mt-6">
            <li><a class="font-bold text-white" href="/">Accueil</a></li>
            <li><a href="{{ url('/rsa-key-generation') }}" class="text-white">Génération de clé RSA</a></li>
            <li><a href="{{ url('/hash-text') }}" class="text-white">Hasher un texte</a></li>
            <li><a href="{{ url('/blocs') }}" class="text-white">Blocs</a></li>
            @if(Auth::check() && Auth::user()->isValidator())
            <li><a href="{{ url('/validate-bloc') }}" class="text-white">Validation de blocs</a></li>
            @endif
            @if(Auth::check() && Auth::user()->isMiner())
            <li><a href="{{ url('/mempool') }}" class="text-white">Mempool</a></li>
            @endif
            <!-- only if connected -->
            @if(Auth::check())
            <li><a href="{{ url('/wallet') }}" class="text-white">Portefeuille</a></li>
            <li><a href="{{ url('/logout') }}" class="text-white">Déconnexion</a></li>
            @else
            <li><a href="{{ url('/login') }}" class="text-white">Connexion</a></li>
            <li><a href="{{ url('/register') }}" class="text-white">Inscription</a></li>
            @endif

        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
</body>
</html>
