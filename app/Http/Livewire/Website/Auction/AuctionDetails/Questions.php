<?php

namespace App\Http\Livewire\Website\Auction\AuctionDetails;

use App\Entities\Auction;
use Illuminate\Support\Collection;
use Livewire\Component;

class Questions extends Component
{
    public Auction $auction;

    public string $title = '';

    public string $successMessage = '';
    protected function rules():array
    {
        return [
            "title" => ["required","string"],
        ];
    }
    public function render()
    {
        $questions = $this->auction->questions()->latest()->limit(10)->answered()->get();

        return view('livewire.website.auction.auction-details.questions',compact('questions'));
    }

    public function ask()
    {
        $this->validate();

        $this->auction->questions()->create([
            'title'     => $this->title,
            'asked_by'  => auth()->id()
        ]);
        $this->successMessage =  'your question had been sent to the auction owner \\n once it answered will be chown here';
        $this->title = '';
    }
}
