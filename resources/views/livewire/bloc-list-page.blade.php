<div>
    <p class="text-2xl m-2 text-center mt-4">Liste des blocs</p>
    <!-- search input to filter blocs -->
    <div class="mx-auto w-fit">
        <div class="mx-auto w-fit">
            <input type="text" wire:model="searchParam" placeholder="Rechercher des blocs" class="border-2 m-4">
            <button wire:click="refreshSearch" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Rechercher</button>
            <button wire:click="resetSearch" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Réinitialiser</button>
        </div>
        <!-- search by id -->
        <div class="mx-auto w-fit">
            <input type="number" wire:model="searchId" placeholder="Rechercher par ID" class="border-2 m-4" wire:keydown.enter="searchByID">
            <button wire:click="searchByID" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Rechercher par id</button>
            <input type="text" wire:model="searchHash" placeholder="Rechercher par hash" class="border-2 m-4" wire:keydown.enter="searchByHash">
            <button wire:click="searchByHash" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Rechercher par hash</button>
        </div>
    </div>
    <!-- display blocs -->
    @foreach($blocs as $bloc)
    <div wire:key="{{ $bloc->id }}">
        @livewire('bloc-displayer', ['bloc' => $bloc], key($bloc->id))
    </div>
    @endforeach
    @if ($blocs->count() == 0)
    <p class="text-center">Aucun bloc</p>
    @endif
    @if(auth()->user())
    <!-- create block -->
    <div class="mx-auto w-fit">
        @if (auth()->user()->isAdmin())
        <button wire:click="createBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Créer un bloc</button>
        @endif
        @if (auth()->user()->isMiner())
        <button wire:click="mineBlock" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Miner un bloc</button>
        @endif
    </div>
    @endif
</div>
