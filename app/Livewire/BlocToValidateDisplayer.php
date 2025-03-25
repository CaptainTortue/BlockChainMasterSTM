<?php

namespace App\Livewire;

use Livewire\Component;

class BlocToValidateDisplayer extends Component
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

    public function validateBloc()
    {
        $this->bloc->setToValidate();
        // remove bloc from list
        $this->dispatch('blocValidated', id: $this->bloc->id);
    }

    public function render()
    {
        return view('livewire.bloc-to-validate-displayer');
    }
}
