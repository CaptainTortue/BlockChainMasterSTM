<div>
    <p class="text-2xl m-2 text-center mt-4">Accueil</p>
    <p class="text-xl font-bold m-4 text-center w-full">Bienvenue sur la blockchain</p>
    <p class="text-center">Vous devriez vous connexter, vous pourez créer un portefeuille, créer des blocs ou des transactions</p>
    @if (auth()->user())
    <div class="mx-auto w-fit">
        @if (auth()->user()->isAdmin())
        <button wire:click="createBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un bloc</button>
        @endif
        @if (auth()->user()->isMiner())
        <button wire:click="mineBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
        @endif
    </div>
    @else
    <p class="text-center mt-4"><a href="{{ url('login') }}" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Se connecter</a></p>
    @endif
</div>
