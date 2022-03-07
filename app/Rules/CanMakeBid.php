<?php

namespace App\Rules;

use App\Entities\Auction;
use Illuminate\Contracts\Validation\Rule;

class CanMakeBid implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($auction = Auction::has('biddings')->where('id',$value)->get()->first()){
            if($auction->biddings->last()->client_id == auth()->user()->userable->id)
                return false;
            return true;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Should Wait Until Other one make a bid';
    }
}
