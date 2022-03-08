<?php

namespace App\Http\Requests;

use App\Rules\RequiredVendorId;
use Illuminate\Foundation\Http\FormRequest;

class AuctionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create-auction');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'vendor_id' => [new RequiredVendorId()],
            'start_price' => ['required', 'numeric'],
            'start_at' => ['required'],
            'end_at' => ['required'],
            'description' => ['required', 'string'],
            'bidding_price' => ['required', 'numeric', 'min:1'],
            'product_ids' => ['required','array'],
            'product_ids.*' => ['required', 'exists:products,id'],
        ];
    }
}
