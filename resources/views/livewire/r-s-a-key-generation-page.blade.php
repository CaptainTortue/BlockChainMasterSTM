<div>
    <p class="text-2xl m-2">Générer des clés RSA</p>
    <!-- Field to enter a passphrase -->
    <input type="text" wire:model="passphrase" placeholder="Entrez un mot de passe" class="border-2 m-4">
    <!-- Button to generate keys -->
    <button wire:click="generateKeys" class="bg-blue-300 rounded p-2 border-2 hover:bg-blue-400">Générer des clés</button>

    @if($privateKey && $publicKey)
    <div class="flex flex-wrap">
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Clé Privée</p>
            <pre class="m-4">{{ $privateKey }}</pre>
        </div>
        <div class="mx-auto">
            <p class="text-xl font-bold m-4 text-center w-full">Clé Publique</p>
            <pre class="m-4">{{ $publicKey }}</pre>
        </div>
    </div>
    @endif
</div>
