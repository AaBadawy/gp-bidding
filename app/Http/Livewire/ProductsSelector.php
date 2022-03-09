<?php

namespace App\Http\Livewire;

use App\Entities\Product;
use Livewire\Component;

class ProductsSelector extends Component
{
    public $products;
    protected $listeners = ['VendorSelected'];

    public function mount()
    {
        if(auth()->user()->isAdmin())
            $this->products = collect();
        if(auth()->user()->isVendor())
            $this->products = Product::withoutAuction()->withVendor(auth()->user()->vendor->id)->get();
    }

    public function render()
    {
        return view('livewire.products-selector');
    }

    public function VendorSelected($vendor_id)
    {
        $this->products = Product::where('vendor_id',$vendor_id)->get();
    }
}
