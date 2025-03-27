<?php

namespace App\Livewire;

use Livewire\Component;

class UserDisplayer extends Component
{
    public $user;
    public $showModalPromotion = false;
    public $newRole = '';

    public function openModal()
    {
        $this->showModalPromotion = true;
    }

    public function closeModal()
    {
        $this->showModalPromotion = false;
    }

    public function changeRole()
    {
        $this->validate([
            'newRole' => 'required|in:admin,user,miner,validator',
        ]);
        // set the role of the user
        $this->user->role = $this->newRole;
        $this->showModalPromotion = false;
    }

    public function render()
    {
        return view('livewire.user-displayer');
    }
}
