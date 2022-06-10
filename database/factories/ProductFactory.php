<?php

namespace Database\Factories;

use App\Entities\Auction;
use App\Entities\Product;
use App\Entities\Vendor;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    public function configure()
    {
        return $this->afterCreating(function (Product $product){
            $random_antique_image = rand(1,5);
            $product->addMediaFromUrl(asset("/media/products/antiques/$random_antique_image.jpg"))->toMediaCollection('main_image');
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'auction_id' => $this->faker->randomElement($this->auctionsIds()),
            'name' => $this->faker->title,
            'price' => $this->faker->numberBetween(),
            'description' => $this->faker->text,
            'vendor_id' => $this->faker->randomElement($this->vendorsIds()),
        ];
    }

    public function auctionsIds()
    {
        return Auction::pluck('id');
    }

    public function vendorsIds()
    {
        return Vendor::pluck('id');
    }
}
