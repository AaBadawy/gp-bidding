<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->userable->can('create-vendor');
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
            'email' => ['required' , 'email'],
            'website' => ['required' , 'url'],
            'description' => ['min:10'],
            'owner.name' => ['required'],
            'owner.email' => ['required' , 'unique:users,email'],
            'owner.password' => ['required' , 'confirmed'],
        ];
    }
}
