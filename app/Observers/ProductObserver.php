<?php

namespace App\Observers;

use App\Entities\Product;

class ProductObserver
{
    public function creating(Product $product)
    {
//        if(auth()->user()->userable::TYPE == 'vendor')
//            $product->vendor_id = auth()->user()->userable->vendor->id;
        $product->ml_title = $product->name;
    }
}
