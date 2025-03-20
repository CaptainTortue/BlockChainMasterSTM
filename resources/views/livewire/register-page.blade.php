<div>
    <p class="text-2xl m-2 text-center">Page d'inscription</p>
    <form wire:submit="createUser">
        <div class="text-center">
            <input type="text" wire:model="username" placeholder="Nom d'utilisateur" class="border-2 m-4 p-4">
        </div>
        <div class="text-center">
            <input type="email" wire:model="email" placeholder="Email" class="border-2 m-4 p-4">
        </div>
        <div class="text-center">
            <input type="text" wire:model="login" placeholder="Login" class="border-2 m-4 p-4">
        </div>
        <div class="text-center">
            <input type="password" wire:model="password" placeholder="Mot de passe" class="border-2 m-4 p-4">
        </div>
        <div class="text-center">
            <input type="password" wire:model="password_confirmation" placeholder="Confirmer le mot de passe" class="border-2 m-4 p-4">
        </div>
        <div class="text-center">
            <button type="submit" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">S'inscrire</button>
        </div>
        <div class="text-center">
            @error('username') <span class="error">Ce nom d'utilisateur est impossible</span> @enderror
            @error('email') <span class="error">Email invalide</span> @enderror
            @error('password') <span class="error">Mot de passe incorrect (minimum 8 caractères)</span> @enderror
            @error('password') <span class="error">Le deuxième mot de passse est incorrect ou différent du premier</span> @enderror
        </div>
    </form>
</div>
