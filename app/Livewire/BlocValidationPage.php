<?php

namespace App\Livewire;

use App\Models\Bloc;
use Livewire\Component;
use Livewire\Attributes\On;

class BlocValidationPage extends Component
{
    public $blocs;

    public function mount()
    {
        // get all bloc wich have not been validated
        $this->blocs = Bloc::whereNull('previous_hash')->get();
        // skip first bloc
        $this->blocs = $this->blocs->skip(1);
    }

    #[On('blocValidated')]
    public function removeBlocFromList($id)
    {
        $this->blocs = $this->blocs->filter(fn ($bloc) => $bloc->id !== $id);
    }


    public function render()
    {
        return view('livewire.bloc-validation-page');
    }
}
