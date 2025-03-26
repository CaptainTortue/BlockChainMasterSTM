<?php

namespace App\Livewire;

use App\Models\Bloc;
use Livewire\Component;

class BlocListPage extends Component
{
    public $blocs;
    public $searchParam = "";
    public $searchHash = "";
    public $searchId = "";

    public function mount()
    {
        // get first bloc and all other wich have previous bloc
        $this->blocs = Bloc::whereNotNull('previous_hash')->orderBy('created_at', 'desc')->get();
        // add first bloc
        $this->blocs->push(Bloc::first());
    }

    public function searchByHash()
    {
        // get blocs with search param
        $this->blocs = Bloc::whereNotNull('previous_hash')
            ->where('hash', 'like', "%$this->searchHash%")
            ->orderBy('created_at', 'desc')->get();
    }

    public function searchByID()
    {
        if ($this->searchId != "") {
            // get blocs with search param
            $this->blocs = Bloc::whereNotNull('previous_hash')
                ->where('id', 'like', "$this->searchId")
                ->orWhere('id', 'like', "#$this->searchId")
                ->orderBy('created_at', 'desc')->get();
        }
    }

    public function refreshSearch()
    {
        // get blocs with search param
        $this->blocs = Bloc::whereNotNull('previous_hash')
            ->where(function ($query) {
                $query->where('hash', 'like', "%$this->searchParam%")
                    ->orWhere('created_at', 'like', "%$this->searchParam%")
                    ->orWhereHas('miner', function ($query) {
                        $query->where('name', 'like', "%$this->searchParam%");
                    })
                    ->orWhereHas('transactions.sender', function ($query) {
                        $query->where('name', 'like', "%$this->searchParam%");
                    })
                    ->orWhereHas('transactions.recipient', function ($query) {
                        $query->where('name', 'like', "%$this->searchParam%");
                    });
            })
            ->orderBy('created_at', 'desc')->get();
    }

    public function resetSearch()
    {
        $this->searchParam = "";
        $this->mount();
    }

    public function render()
    {
        return view('livewire.bloc-list-page');
    }
}
