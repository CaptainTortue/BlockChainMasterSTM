<div>
    <p class="text-2xl m-2 text-center mt-4">Portefeuille</p>
    @foreach($wallets as $wallet)
    <div wire:key="{{ $wallet->id }}">
        @livewire('wallet-displayer', ['wallet' => $wallet], key($wallet->id))
    </div>
    @endforeach
    @if ($wallets->count() == 0)
    <p class="text-center">Aucun portefeuille</p>
    @endif
    <!-- create wallet -->
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Créer un portefeuille</p>
            <input type="text" wire:model="nameNewWallet" placeholder="Nom" class="border-2 m-4">
            <button wire:click="createWallet" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un portefeuille</button>
        </div>
    </div>
    <div class="mx-auto w-fit">
        @if (auth()->user()->isAdmin())
        <button wire:click="createBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un bloc</button>
        @endif
        @if (auth()->user()->isMiner())
        <button wire:click="mineBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
        @endif
    </div>
</div>
