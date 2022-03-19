<?php

namespace App\Http\Livewire\Website\Profile\InvolvedAuctions;

use Livewire\Component;

class ChangeStatus extends Component
{
    public string $status;

    public string $defaultStatus = "past";

    public function render()
    {
        return view('livewire.website.profile.involved-auctions.change-status');
    }

    public function changeStatus()
    {
        $this->emit("changeAuctionsStatuses",$this->status);
    }

}
