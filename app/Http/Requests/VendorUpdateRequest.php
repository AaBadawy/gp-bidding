<?php

namespace App\Http\Requests;

use App\Entities\Vendor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VendorUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('edit-vendor');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'website' => ['required', 'url'],
            'email' => ['required', 'email'],
            'description' => ['nullable', 'min:10'],
            'owner' => [
                'name' => ['required'],
                'email' => ['required' , Rule::unique('users', 'email')->ignore(Vendor::find($this->vendor)->owner->user->id) ],
                'password' => ['confirmed'],
            ]
        ];
    }
}
