<?php

namespace App\Http\Livewire\Website\Watching;

use Livewire\Component;

class Counter extends Component
{
    protected $listeners = ["toggled" => '$refresh',"auctionRemoved"];

    public int $count = 0;

    public function mount()
    {
        $this->count = watching()->count();
    }

    public function auctionRemoved()
    {
        $this->count = --$this->count;
    }

    public function render()
    {
        return view('livewire.website.watching.counter');
    }
}
