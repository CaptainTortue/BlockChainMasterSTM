<div>
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
    <!-- tab of transactions -->
    <div class="mx-auto w-[80%]">
        <table class="w-full">
            <thead>
            <tr class="border rounded-t">
                <th class="">ID</th>
                <th class="">Expéditeur</th>
                <th class="">Destinataire</th>
                <th class="">Montant</th>
                <th class="">Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
            <tr class="border">
                <td class="text-center p-4">{{ $transaction->id }}</td>
                @if ($transaction->sender_id)
                <td class="text-center p-4">{{ $transaction->sender->address }} {{ $transaction->sender->name }}</td>
                @else
                <td class="text-center">Expéditeur: Récompense</td>
                @endif
                <td class="text-center p-4">{{ $transaction->recipient->address }} {{ $transaction->recipient->name }}</td>
                <td class="text-center p-4">{{ number_format($transaction->amount, 2) }}</td>
                <td class="text-center p-4">{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- pagination, with previous, index of tab, -1, -2, -3 if exist, +1, +2, +3 if exist, and next -->
        <div class="p-4">
            <div class="flex justify-center">
                @if ($page != 0)
                <button wire:click="goToPage(0)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">Début</button>
                <button wire:click="previousPage" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">Précédent</button>
                @endif
                @if ($page >= 3)
                <button wire:click="goToPage(-3)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">{{$page - 3}}</button>
                @endif
                @if ($page >= 2)
                <button wire:click="goToPage(-2)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">{{$page - 2}}</button>
                @endif
                @if ($page >= 1)
                <button wire:click="goToPage(-1)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">{{$page - 1}}</button>
                @endif
                <button class="rounded p-2 border-2 border-black m-2 bg-blue-100">{{ $page }}</button>
                @if ($wallet->transactions->count() > ($page + 1) * $numberOfTransactionsByPage)
                <button wire:click="goToPage(1)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">{{$page + 1}}</button>
                @endif
                @if ($wallet->transactions->count() > ($page + 2) * $numberOfTransactionsByPage)
                <button wire:click="goToPage(2)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">{{$page + 2}}</button>
                @endif
                @if ($wallet->transactions->count() > ($page + 3) * $numberOfTransactionsByPage)
                <button wire:click="goToPage(3)" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">{{$page + 3}}</button>
                @endif
                @if ($wallet->transactions->count() > ($page + 1) * $numberOfTransactionsByPage)
                <button wire:click="nextPage" class="rounded p-2 border-2 hover:bg-blue-300 border-black m-2">Suivant</button>
                @endif
            </div>
        </div>

    </div>
    @endif
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Envoyer de l'argent depuis ce portefeuille</p>
            <input type="text" wire:model="address" placeholder="Adresse du destinataire" class="border-2 m-4">
            <input type="number" wire:model="amount" placeholder="Montant" class="border-2 m-4">
            <button wire:click="sendMoney" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Envoyer de l'argent</button>
            <p wire:loading wire:target="sendMoney">Transaction en cours...</p>
            <!-- success message -->
            @if ($successTransaction)
            <span class="text-green-500">Transaction effectuée avec succès</span>
            @endif
        </div>
    </div>
</div>
