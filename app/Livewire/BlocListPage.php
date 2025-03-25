<?php

namespace App\Livewire;

use App\Models\Bloc;
use Livewire\Component;

class BlocListPage extends Component
{
    public $blocs;

    public function mount()
    {
        // get first bloc and all other wich have previous bloc
        $this->blocs = Bloc::whereNotNull('previous_hash')->get();
        // add first bloc
        $this->blocs->push(Bloc::first());
    }

    public function render()
    {
        return view('livewire.bloc-list-page');
    }
}
