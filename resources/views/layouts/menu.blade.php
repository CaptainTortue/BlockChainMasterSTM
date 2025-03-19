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
            <li><a class="font-bold" href="/">Accueil</a></li>
            <li><a href="/rsa-key-generation">Génération de clé RSA</a></li>
        </ul>
    </nav>
</header>
<main>
    @yield('content')
</main>
@livewireScripts
</body>
</html>
