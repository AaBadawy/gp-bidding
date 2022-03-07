<?php

namespace App\Http\Requests;

use App\Rules\RequiredVendorId;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->userable->can('create-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'description'=> 'required|string',
            'vendor_id' => [new RequiredVendorId(),'exists:vendors,id'],
            'price' => 'required|numeric|min:1',
            'product-image' => 'required|image',
            'sold' => 'boolean'
        ];
    }
}
