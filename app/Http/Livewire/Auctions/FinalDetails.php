<?php

namespace App\Http\Livewire\Auctions;

use App\Entities\Auction;
use Illuminate\Support\Str;
use Livewire\Component;

class FinalDetails extends Component
{
    public Auction $auction;

    public string $preview ;

    public float|null $number;

    public function mount()
    {
        $this->firePreviewingData();
    }

    protected function getListeners()
    {
        return [
            "echo:auctions.{$this->auction->id},BidCreated" => 'firePreviewingData',
        ];
    }

    public function render()
    {
        return view('livewire.auctions.final-details');
    }

    public function firePreviewingData()
    {
        $glows = explode('->',$this->preview);
        $result = $this->auction;
        foreach ($glows as $item) {
            if(empty($item))
                continue;
            if(Str::contains($item,['(',')'])) {
                $item = Str::remove(["(", ")"], $item);
                $result = $result?->$item();
            }
            else
                $result = $result?->$item;
        }
        $this->number = (float) $result;
    }
}
