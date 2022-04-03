<?php

namespace App\Http\Livewire\Website;

use App\Entities\Auction;
use Livewire\Component;

class WatchingToggle extends Component
{
    public Auction $auction;

    public bool $watching = false;

    protected $listeners = ["toggled" => '$refresh'];

    public function mount()
    {
        $this->watching();
    }

    public function render()
    {
        return view('livewire.website.watching-toggle');
    }

    public function watching()
    {
        $this->watching = watching()->exists($this->auction);
    }

    public function toggle()
    {
        watching()->toggle($this->auction);

        $this->watching();

        $this->emitSelf("toggled");
    }
}
