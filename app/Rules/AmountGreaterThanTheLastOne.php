<?php

namespace App\Rules;

use App\Entities\Auction;
use Illuminate\Contracts\Validation\Rule;
use function Symfony\Component\Translation\t;

class AmountGreaterThanTheLastOne implements Rule
{
    protected $auction_id;
    protected $auction;
    protected $last_amount;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($auction_id)
    {
        $this->auction_id = $auction_id;
        $this->findAuction();
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
        if(! $this->auction)
            return false;
        if(!$this->auction->biddings->count()){
            if($value < $this->auction->start_price)
                return true;
        }
        if($this->last_amount > $value)
            return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Amount Should be Greater than';
    }

    /**
     * @return mixed
     */
    private function findAuction()
    {
        $this->auction = Auction::with(['biddings'])->find($this->auction_id);
        if($this->auction && $this->auction->biddings->count())
            $this->last_amount == $this->auction->biddings->last()->amount_price;
    }
}
