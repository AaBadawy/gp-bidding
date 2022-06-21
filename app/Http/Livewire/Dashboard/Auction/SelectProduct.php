<?php

namespace App\Http\Livewire\Dashboard\Auction;

use App\Entities\Product;
use App\Entities\Vendor;
use Illuminate\Support\Collection;
use Livewire\Component;

class SelectProduct extends Component
{
    public Collection $products;

    protected $listeners = ['vendor-changed' => 'getProducts'];

    public function mount()
    {
        $this->getProducts(auth()->user()->isVendor() ? auth()->user()->vendor()->value("id") : null);
    }
    public function render()
    {
        return view('livewire.dashboard.auction.select-product');
    }

    public function getProducts(string|int $vendor_id = null)
    {
        $vendor_id = ! is_null($vendor_id) ? $vendor_id : Vendor::query()->has('products')->value("id");

        $this->products = Product::query()->where("vendor_id",$vendor_id)
            ->doesntHave("auction")
            ->limit(50)->get();
    }
}
