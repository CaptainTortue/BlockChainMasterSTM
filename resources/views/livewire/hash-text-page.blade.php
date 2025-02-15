<div>
    <input type="text" wire:model="text" placeholder="Enter text">
    <button wire:click="hashText">Hash Text</button>
    <div>
        <strong>Hashed Text:</strong> {{ $hashedText }}
    </div>
</div>
