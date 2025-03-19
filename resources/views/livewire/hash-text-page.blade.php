<div>
    <p class="text-2xl m-2">Entrez votre texte</p>
    <input type="text" wire:model="text" placeholder="Votre text" class="border-2 m-4">
    <button wire:click="hashText" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Hash Text</button>
    <div class="flex flex-wrap">
        <strong class="ml-2">Version hasher du texte :</strong>
        <!-- Display the hashed text if is not null-->
        @if($hashedText)
        <pre class="ml-2">{{ $hashedText }}</pre>
        @endif
    </div>
</div>
