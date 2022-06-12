<?php

namespace App\Http\Livewire\Dashboard\Auction;

use App\Entities\Vendor;
use Illuminate\Support\Collection;
use Livewire\Component;

class SelectVendor extends Component
{
    public Collection $vendors;

    public string|int $vendor_id;

    public function mount()
    {
        if(auth()->user()->isAdmin())
            $this->vendors = \App\Entities\Vendor::query()->has("products")->limit("20")->get();
        else
            $this->vendors = collect();
        $this->vendor_id = Vendor::query()->limit(1)->has("products")->value('id');
    }

    public function updatedVendorId()
    {
        $this->emitTo("dashboard.auction.select-product","vendor-changed",$this->vendor_id);
    }
    public function render()
    {
        return view('livewire.dashboard.auction.select-vendor');
    }
}
