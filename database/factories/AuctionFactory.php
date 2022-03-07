<?php

namespace Database\Factories;

use App\Entities\Auction;
use App\Entities\Vendor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuctionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Auction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->name,
            'description' => $this->faker->text,
            'start_price' => $this->faker->randomNumber(4),
            'bidding_price' => $this->faker->randomNumber(4),
            'start_at' => $this->faker->dateTime,
            'end_at' => $this->faker->dateTime,
            'vendor_id' => $this->faker->randomElement($this->vendorIds()),
            'status' => $this->faker->randomElement(['pending', 'ready', 'started' , 'finished'])
        ];
    }
    public function vendorIds()
    {
        return Vendor::pluck('id');
    }

    public function auctionsIds()
    {
        return Auction::pluck('id');
    }
}
