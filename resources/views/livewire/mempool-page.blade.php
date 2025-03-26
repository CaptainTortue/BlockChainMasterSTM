<div>
    <h2 class="text-2xl text-center mt-4">Mempool</h2>
    <!-- display mempool, tab of transaction -->
    <div class="mx-auto">
        <p class="text-xl font-bold text-center w-full">Transactions en attente</p>
        <div class="flex flex-wrap w-full justify-between p-4">
        @foreach($mempoolTransactions as $transaction)
            <div class="border rounded p-4 w-fit my-4 hover:shadow-lg" wire:click="addTransactionToBloc({{ $transaction->id }})">
                <p class="text-center">ID: {{ $transaction->id }} Frais: {{ number_format($transaction->fee, 2) }}</p>
                @if ($transaction->sender_id)
                <p class="text-center">Expéditeur: {{ $transaction->sender->address }} {{ $transaction->sender->name }}</p>
                @else
                <p class="text-center">Expéditeur: Récompense</p>
                @endif
                <p class="text-center">Destinataire: {{ $transaction->recipient->address }} {{ $transaction->recipient->name }}</p>
                <p class="text-center">Montant: {{ number_format($transaction->amount, 2) }}</p>
                <p class="text-center">Date: {{ $transaction->created_at }}</p>
            </div>
        @endforeach
        </div>
        @if ($mempoolTransactions->count() == 0)
        <p class="text-center">Aucune transaction en attente</p>
        @endif
        <!-- espace en bas de la fenetre, en fixe, pour le recap des transactions du bloc et le boutton de confirmation du bloc -->
        <div class="fixed bottom-0 w-full bg-white shadow-[0_35px_35px]">
            <div class="flex p-4">
                <div class="w-full flex-wrap lg:flex-nowrap flex">
                @foreach($transactionsForBlock as $transactionForBlock)
                <div class="border rounded p-4 w-fit my-4 hover:bg-blue-100" wire:click="removeTransactionFromBloc({{ $transactionForBlock->id }})">
                    <p class="text-center">ID: {{ $transactionForBlock->id }} Frais: {{ number_format($transactionForBlock->fee, 2) }}</p>
                    @if ($transactionForBlock->sender_id)
                    <p class="text-center">Expéditeur: {{ $transactionForBlock->sender->address }} {{ $transactionForBlock->sender->name }}</p>
                    @else
                    <p class="text-center">Expéditeur: Récompense</p>
                    @endif
                    <p class="text-center">Destinataire: {{ $transactionForBlock->recipient->address }} {{ $transactionForBlock->recipient->name }}</p>
                    <p class="text-center">Montant: {{ number_format($transactionForBlock->amount, 2) }}</p>
                    <p class="text-center">Date: {{ $transactionForBlock->created_at }}</p>
                </div>
                @endforeach
                </div>
                <div class="border rounded p-4 w-fit my-4 ml-auto">
                    <p class="text-center">Frais total: {{ number_format($totalFee, 2) }}</p>
                    <p class="text-center">Montant total: {{ number_format($totalAmount, 2) }}</p>
                </div>
                <button wire:click="confirmBlock" class="bg-blue-300 max-h-20 h-fit rounded p-2 border-2 hover:bg-blue-400 my-12 ml-6">Confirmer le bloc</button>
            </div>
        </div>
    </div>
</div>
