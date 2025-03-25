<div>
    <p class="text-2xl m-2 text-center mt-4">Liste des blocs</p>
    @foreach($blocs as $bloc)
    <div wire:key="{{ $bloc->id }}">
        @livewire('bloc-displayer', ['bloc' => $bloc], key($bloc->id))
    </div>
    @endforeach
    @if ($blocs->count() == 0)
    <p class="text-center">Aucun bloc</p>
    @endif
    <!-- create block -->
    <div class="mx-auto w-fit">
        @if (auth()->user()->isAdmin())
        <button wire:click="createBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un bloc</button>
        @endif
        @if (auth()->user()->isMiner())
        <button wire:click="mineBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
        @endif
    </div>
</div>
