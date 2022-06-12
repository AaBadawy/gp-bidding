<?php

namespace Database\Factories;

use App\Entities\Auction;
use App\Entities\Category;
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
            'start_price' => $this->faker->randomNumber(3),
            'bidding_price' => $this->faker->randomNumber(3),
            'start_at' => $this->faker->dateTime,
            'end_at' => $this->faker->dateTime,
            'vendor_id' => $this->faker->randomElement($this->vendorIds()),
            'status' => $this->faker->randomElement(['pending', 'ready', 'started' , 'finished']),
            'category_id'   => Category::query()->inRandomOrder()->limit(1)->first()?->id,
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

    public function running()
    {
        return $this->state(function (array $attributes){
            return [
                'end_at'        => today()->addDays(4)->format("Y-m-d H:i"),
                "start_at"      => today()->format("Y-m-d H:i"),
            ];
        });
    }
}
