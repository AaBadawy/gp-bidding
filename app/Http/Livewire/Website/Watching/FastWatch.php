<?php

namespace App\Http\Livewire\Website\Watching;

use App\Entities\Auction;
use Livewire\Component;

class FastWatch extends Component
{
    public Auction $auction;

    public bool $isWatching;

    protected $listeners = ["toggled" => '$refresh'];

    public function mount()
    {
        $this->isWatching();
    }

    public function render()
    {
        return view('livewire.website.watching.fast-watch');
    }

    public function isWatching()
    {
        $this->isWatching = watching()->exists($this->auction);
    }

    public function toggle()
    {
        watching()->toggle($this->auction);

        $this->isWatching();

        $this->emitSelf("toggled");

        $this->emitTo("website.watching.counter","toggled");

        $this->emit("auction-toggled");

        $this->emitTo("website.watching.all-auctions","toggled");
    }
}
