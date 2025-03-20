<div>
    <p class="text-2xl m-2">Portefeuille</p>
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Solde</p>
            <pre class="m-4">{{ $balance }}</pre>
        </div>
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Transactions</p>
            <pre class="m-4">{{ $transactions }}</pre>
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Envoyer de l'argent</p>
            <input type="text" wire:model="recipient" placeholder="Adresse du destinataire" class="border-2 m-4">
            <input type="number" wire:model="amount" placeholder="Montant" class="border-2 m-4">
            <input type="text" wire:model="privateKey" placeholder="Clé privée" class="border-2 m-4">
            <button wire:click="sendMoney" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Envoyer de l'argent</button>
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Miner un bloc</p>
            <input type="text" wire:model="miner" placeholder="Adresse du mineur" class="border-2 m-4">
            <button wire:click="mineBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
        </div>
    </div>
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <button wire:click="addNode" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Faire une trasaction</button>
        </div>
    </div>
</div>
