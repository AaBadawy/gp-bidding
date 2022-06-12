<?php

namespace App\Http\Requests;

use App\Rules\RequiredVendorId;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuctionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
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
            'name'                  => ['required','string'],
            'vendor_id'             => [Rule::requiredIf(fn() => $this->user()->isAdmin())],
            'start_price'           => ['required', 'numeric'],
            'start_at'              => ['required','date','date_format:Y-m-d H:i','after:today'],
            'end_at'                => ['required','date','date_format:Y-m-d H:i','after:start_at'],
            'description'           => ['required', 'string'],
            'bidding_price'         => ['required', 'numeric', 'min:1'],
            'product_ids'           => ['required','array'],
            'product_ids.*'         => ['required', Rule::exists('products','id')],
        ];
    }
}
