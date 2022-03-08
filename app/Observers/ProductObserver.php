<?php

namespace App\Observers;

use App\Entities\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
//        if(auth()->user()::TYPE == 'vendor')
//            $product->vendor_id = auth()->user()->vendor->id;
        $product->ml_title = $product->name;
    }
}
