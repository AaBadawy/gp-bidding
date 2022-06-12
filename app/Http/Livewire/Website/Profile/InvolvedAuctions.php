<?php

namespace App\Http\Livewire\Website\Profile;

use App\Entities\Auction;
use Illuminate\Support\Collection;
use Livewire\Component;

class InvolvedAuctions extends Component
{
    public string $status;


    public int $perPage = 10;

    protected  $listeners = ["changeAuctionsStatuses" => "changeStatus"];

    public function mount()
    {
        $this->changeStatus();
    }

    public function render()
    {
        $auctions = $this->setAuctions();

        return view('livewire.website.profile.involved-auctions',['auctions' => $auctions]);
    }

    public function changeStatus(string $status = "past")
    {
        $this->status = $status;

    }

    protected function setAuctions()
    {
        return auth()->user()
            ->involvedAuctionsDistinct()
            ->{$this->status}()
            ->withCount("biddings")
            ->latest()
            ->get()
            ->unique();
//            ->paginate($this->perPage);
    }
}
