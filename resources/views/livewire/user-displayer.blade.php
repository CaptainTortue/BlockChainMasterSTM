<div>
    <div class="flex flex-wrap">
        <div class="mx-auto my-4 flex">
            <div class="text-xl text-center ml-2">{{ $user->name }}, {{ $user->login }}, {{ $user->role }}</div>
        </div>
    </div>
    <div class="mx-auto w-fit">
        <button wire:click="openModal" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Changer de role</button>
    </div>
    <!-- modal for change role -->
    @if($showModalPromotion)
    <div class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75">
        <div class="bg-white p-6 rounded shadow-lg">
            <h2 class="text-xl mb-4">Changer le rôle de l'utilisateur</h2>
            <select wire:model="newRole" class="border-2 p-2 mb-4">
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="miner">Miner</option>
                <option value="validator">Validateur</option>
            </select>
            <div class="flex justify-end">
                <button wire:click="closeModal" class="bg-gray-300 rounded p-2 border-2 hover:bg-gray-400 mr-2">Annuler</button>
                <button wire:click="changeRole" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Changer</button>
            </div>
        </div>
    </div>
    @endif
</div>
