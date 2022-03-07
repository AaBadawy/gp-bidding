<?php

namespace App\Rules;

use App\Entities\Auction;
use Illuminate\Contracts\Validation\Rule;

class AuctionEnded implements Rule
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
//        if(now() > Auction::find($value)->end_date)
//            return false;
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Auction Had Been Ended';
    }
}
