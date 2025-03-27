<div>
    <p class="text-2xl text-center">Page d'utilisateurs</p>
    @foreach($users as $user)
    <div wire:key="{{ $user->id }}">
        @livewire('user-displayer', ['user' => $user], key($user->id))
    </div>
    @endforeach
    @if ($users->count() == 0)
    <p class="text-center">Aucun utilisateur</p>
    @endif
    <!-- create user -->
    <div class="mx-auto">
        <p class="text-xl font-bold text-center w-full">Créer un utilisateur</p>
        <input type="text" wire:model="nameNewUser" placeholder="Nom" class="border-2 m-4">
        <input type="text" wire:model="loginNewUser" placeholder="Login" class="border-2 m-4">
        <input type="password" wire:model="passwordNewUser" placeholder="Mot de passe" class="border-2 m-4">
        <button wire:click="createUser" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un utilisateur</button>
    </div>
</div>
