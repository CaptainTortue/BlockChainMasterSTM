<div>
    <p class="text-2xl m-2 text-center mt-4">Portefeuille</p>
    @foreach($wallets as $wallet)
        @livewire('wallet-displayer', ['wallet' => $wallet]))
    @endforeach
    @if (auth()->user()->isAdmin())
        <div class="flex flex-wrap">
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Créer un bloc</p>
                <input type="text" wire:model="data" placeholder="Données" class="border-2 m-4">
                <button wire:click="createBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un bloc</button>
            </div>
        </div>
    @endif
    @if (auth()->user()->isMiner())
        <div class="flex flex-wrap">
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Miner un bloc</p>
                <input type="text" wire:model="miner" placeholder="Adresse du mineur" class="border-2 m-4">
                <button wire:click="mineBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
            </div>
        </div>
    @endif
    <!-- create wallet -->
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Créer un portefeuille</p>
            <input type="text" wire:model="name" placeholder="Nom" class="border-2 m-4">
            <input type="text" wire:model="privateKey" placeholder="Clé privée" class="border-2 m-4">
            <button wire:click="createWallet" class="bg-blue-300 rounded p-2 border-8 hover:bg-blue-400">Créer un portefeuille</button>
        </div>
    </div>
</div>
