<?php

namespace App\Livewire;

use Livewire\Component;

class HashTextPage extends Component
{
    public $text = '';
    public $hashedText = '';

    public function hashText()
    {
        $this->hashedText = hash('sha256', $this->text);
    }

    public function render()
    {
        return view('livewire.hash-text-page');
    }
}
