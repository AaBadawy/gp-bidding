<?php

namespace App\Http\Controllers\Website\Pages;

use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Repositories\Contracts\VendorRequestRepository;

class VendorRequestController extends Controller
{

    public function __construct(protected VendorRequestRepository $vendorRequestRepository)
    {
    }

    public function page()
    {
        return view("website.pages.vendor-request");
    }

    public function submit(VendorRequest $request)
    {
        $this->vendorRequestRepository->create($request->validated());

        return redirect()->back()->with("success_message" ,"Request Created Successfully");
    }
}
