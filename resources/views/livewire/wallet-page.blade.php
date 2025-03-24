<div>
    <p class="text-2xl m-2 text-center mt-4">Portefeuille</p>
    @foreach($wallets as $wallet)
        <div class="flex flex-wrap">
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Nom</p>
                <p class="m-4 text-center w-full">{{ $wallet->name }}</p>
            </div>
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Solde</p>
                <p class="m-4 text-center w-full">{{ $wallet->balance }}</p>
            </div>
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Nombre Transactions</p>
                @if ($wallet->transactions->count() == 0)
                    <p class="m-4 text-center w-full">Aucune transaction</p>
                @else
                    <p class="m-4 text-center w-full">{{ $wallet->transactions->count() }}</p>
                @endif
            </div>
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Adresse</p>
                <p class="m-4 text-center w-full">{{ $wallet->address }}</p>
            </div>
        </div>
        <p class="text-xl font-bold p-4 text-center w-full">Transactions</p>
        @if ($wallet->transactions->count() == 0)
            <p class="p-4 text-center w-full">Aucune transaction</p>
        @else
            @foreach($wallet->transactions as $transaction)
            <p class="m-4">{{ $transaction->hash }}</p>
            <p class="m-4">{{ $transaction->amount }}</p>
            @endforeach
        @endif
        <div class="flex flex-wrap">
            <div class="mx-auto">
                <p class="text-xl font-bold m-4 text-center w-full">Envoyer de l'argent depuis ce portefeuille</p>
                <input type="text" wire:model="recipient" placeholder="Adresse du destinataire" class="border-2 m-4">
                <input type="number" wire:model="amount" placeholder="Montant" class="border-2 m-4">
                <input type="text" wire:model="privateKey" placeholder="Clé privée" class="border-2 m-4">
                <button wire:click="sendMoney" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Envoyer de l'argent</button>
            </div>
        </div>
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
            <button wire:click="createWallet" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un portefeuille</button>
        </div>
    </div>
</div>
