<?php

namespace App\Http\Livewire\Website\Watching;

use Illuminate\Support\Collection;
use Livewire\Component;

class AllAuctions extends Component
{
    public Collection $auctions;

    protected $listeners = ["auction-removed" => '$refresh',"toggled" => '$refresh'];

    public function mount()
    {
        $this->auctions = watching()->all(5);
    }

    public function render()
    {
        return view('livewire.website.watching.all-auctions');
    }
}
