<?php

namespace Tests\Feature\Product;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function should_store_product_when_valid()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class, Authenticate::class]);
        $product_data = $this->productData();
        $respond = $this->post(config('antique.dashboard-prefix'). '/products', $product_data);
        $respond->assertSessionHasNoErrors();
        $respond->assertStatus(302);
    }

    /** @test */
    public function should_not_save_data_when_not_valid()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class, Authenticate::class]);
        $product_data = $this->productNotValidData();
        $respond = $this->post(config('antique.dashboard-prefix'). '/products', $product_data);
        $respond->assertSessionHasErrors(['name', 'price', 'description']);
        $respond->assertStatus(302);
    }

    /**
     * @return array
     */
    public function productData():array
    {
        return [
                'name' => 'New Last Product',
                'price' => 12.89,
                'description' => 'This is New Description',
            ];
    }

    /**
     * @return array
     */
    public function productNotValidData():array
    {
        return [
            'name' => '',
            'price' => 0,
            'description' => '',
        ];
    }
}
