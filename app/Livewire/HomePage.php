<?php

namespace App\Livewire;

use Livewire\Component;

class HomePage extends Component
{
    public function mineBlock()
    {
        // redirect to the mining page
        return redirect()->route('mining');
    }

    public function render()
    {
        return view('livewire.home-page');
    }
}
