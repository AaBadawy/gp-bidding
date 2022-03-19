<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()?->isClient();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"      => ["required","string"],
            "email"     => ["required","email"],
            "mobile"    => ["required","string","min:10"],
            "note"      => ["required","string"],
        ];
    }

    public function validated()
    {
        $validated =  parent::validated();

        $validated['requester_id'] = auth()->id();

        return $validated;
    }
}
