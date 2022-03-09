<?php

namespace App\Http\Requests;

use App\Rules\RequiredVendorId;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create-product');
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
            'vendor_id' => [Rule::requiredIf(fn () => $this->user()?->isAdmin()),'exists:vendors,id'],
            'price' => 'required|numeric|min:1',
            'product-image' => 'required|image',
            'sold' => 'boolean'
        ];
    }
}
