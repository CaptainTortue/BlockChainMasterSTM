<div>
    <p class="text-2xl m-2">Page de connexion</p>
    <input type="text" wire:model="login" placeholder="Login" class="border-2 m-4">
    <input type="password" wire:model="password" placeholder="Mot de passe" class="border-2 m-4">
    <button wire:click="loginUser" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Se connecter</button>
    <p wire:loading wire:target="loginUser">Connexion en cours...</p>
</div>
