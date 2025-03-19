<?php

namespace App\Livewire;

use Livewire\Component;

class RSAKeyGenerationPage extends Component
{
    public $passphrase;

    public $privateKey;
    public $publicKey;

    public function generateKeys()
    {
        $config = [
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
            'config' => 'C:\laragon\bin\git\usr\ssl\openssl.cnf', // Remplacez par le chemin réel de votre fichier openssl.cnf
        ];

        $res = openssl_pkey_new($config);

        if ($res === false) {
            dd('Key generation failed', openssl_error_string());
            return;
        }

        $exportResult = openssl_pkey_export($res, $this->privateKey, $this->passphrase, $config);

        if ($exportResult === false) {
            dd('Key export failed', openssl_error_string());
            return;
        }
        $this->publicKey = openssl_pkey_get_details($res)['key'];
    }

    public function render()
    {
        return view('livewire.r-s-a-key-generation-page');
    }
}
