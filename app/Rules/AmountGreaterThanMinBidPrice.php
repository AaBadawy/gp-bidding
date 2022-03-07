<?php

namespace App\Rules;

use App\Entities\Auction;
use Illuminate\Contracts\Validation\Rule;

class AmountGreaterThanMinBidPrice implements Rule
{
    protected $auction_id;
    protected $auction;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($auction_id)
    {
        $this->auction = Auction::find($auction_id);
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
//        if($value > $this->auction->)
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
