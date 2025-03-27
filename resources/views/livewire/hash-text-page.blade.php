<div>
    <p class="text-2xl m-2">Entrez votre texte</p>
    <input type="text" wire:model="text" placeholder="Votre text" class="border-2 m-4">
    <button wire:click="textToHash" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Hash Text</button>
    <div class="flex flex-wrap">
        <strong class="ml-2">Version hasher du texte :</strong>
        <!-- Display the hashed text if is not null-->
        @if($hashedText)
        <pre class="ml-2">{{ $hashedText }}</pre>
        @endif
    </div>
    <!-- hash to text -->
    <p class="text-2xl m-2">Entrez votre hash à vérifier</p>
    <input type="text" wire:model="hashToVerify" placeholder="Votre hash" class="border-2 m-4">
    <input type="text" wire:model="textToVerify" placeholder="Votre texte a vérifier" class="border-2 m-4">
    <button wire:click="checkHash" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Hash To Text</button>
    @if($verificationResult === true)
    <div class="flex flex-wrap">
        <strong class="ml-2">Le hash correspond au texte :</strong>
        <pre class="ml-2">{{ $textToVerify }}</pre>
    </div>
    @elseif($verificationResult === false)
    <div class="flex flex-wrap">
        <strong class="ml-2">Le hash ne correspond pas au texte :</strong>
        <pre class="ml-2">{{ $textToVerify }}</pre>
    </div>
    @endif

</div>
