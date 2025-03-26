<div>
    <p class="text-2xl m-2 text-center mt-4">Validation de bloc</p>
    @foreach($blocs as $bloc)
    <div wire:key="{{ $bloc->id }}">
        @livewire('bloc-to-validate-displayer', ['bloc' => $bloc], key($bloc->id))
    </div>
    @endforeach
    @if ($blocs->count() == 0)
    <p class="text-center">Aucun bloc</p>
    @endif
    <!-- create bloc -->
    <div class="mx-auto w-fit">
        @if (auth()->user()->isMiner())
        <button wire:click="minebloc" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
        @endif
    </div>
</div>
