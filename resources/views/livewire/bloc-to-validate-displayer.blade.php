<div>
    <!-- display block, on clic display transactiosn list -->
    <div class="mx-auto w-[80%]">
        <div class="border rounded p-4 my-4">
            <p class="text-center">Bloc #{{ $bloc->id }}</p>
            <p class="text-center">Hash : {{ $bloc->hash }}</p>
            <p class="text-center">Nonce : {{ $bloc->nonce }}</p>
            <p class="text-center">Créé le : {{ $bloc->created_at }}</p>
            <button wire:click="switchDisplayTransactions" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Afficher les transactions</button>
            <button wire:click="validateBloc" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Valider le bloc</button>
            <span wire:loading wire:target="validateBloc">Validation en cours...</span>
            <span wire:loading wire:target="switchDisplayTransactions">Chargement en cours...</span>
        </div>
        <!-- display transactions -->
        @if ($displayTransactions)
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
            @foreach($bloc->transactions as $transaction)
            <tr class="border">
                <td class="text-center p-4">{{ $transaction->id }}</td>
                <td class="text-center p-4">{{ $transaction->sender->address }} {{ $transaction->sender->name }}</td>
                <td class="text-center p-4">{{ $transaction->recipient->address }} {{ $transaction->recipient->name }}</td>
                <td class="text-center p-4">{{ number_format($transaction->amount, 2) }}</td>
                <td class="text-center p-4">{{ $transaction->created_at }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
