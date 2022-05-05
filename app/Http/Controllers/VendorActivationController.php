<?php

namespace App\Http\Controllers;

use App\Entities\Vendor;
use App\Http\Requests\VendorActivationRequest;
use App\Repositories\Contracts\VendorRepository;

class VendorActivationController
{


    protected VendorRepository $vendorRepository;

    public function __construct(VendorRepository $vendorRepository)
    {
        $this->vendorRepository = $vendorRepository;
    }

    public function __invoke(VendorActivationRequest $request,Vendor $vendor)
    {
        $this->vendorRepository->toggleStatus($vendor);

        return redirect()->back();
    }
}
