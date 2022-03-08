<?php

namespace App\Http\Livewire;

use App\Entities\Vendor;
use Livewire\Component;

class VendorsSelector extends Component
{
    public $vendor;

    public function getVendorsProperty()
    {
        if(auth()->user()::TYPE == 'vendor')
            return collect();
        return Vendor::all();
    }


    public function updatedVendor($value)
    {
        $this->emit('VendorSelected',$value);
    }

    public function render()
    {
        return view('livewire.vendors-selector');
    }

}
