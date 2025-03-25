<?php

namespace App\Livewire;

use Livewire\Component;

class BlocDisplayer extends Component
{
    public $bloc;
    public $displayTransactions = false;

    public function mount($bloc)
    {
        $this->bloc = $bloc;
    }

    public function switchDisplayTransactions()
    {
        $this->displayTransactions = !$this->displayTransactions;
    }

    public function render()
    {
        return view('livewire.bloc-displayer');
    }
}
