<?php

namespace App\Livewire;

use Livewire\Component;

class HashTextPage extends Component
{
    public $text ;
    public $hashedText;
    public $hash;
    public $textToVerify;
    public $hashToVerify;
    public $verificationResult;

    public function textToHash()
    {
        $this->hashedText = hash('sha256', $this->text);
    }

    public function checkHash()
    {
        $hashedTextToVerify = hash('sha256', $this->textToVerify);
        $this->verificationResult = ($hashedTextToVerify === $this->hashToVerify);
    }


    public function render()
    {
        return view('livewire.hash-text-page');
    }
}
