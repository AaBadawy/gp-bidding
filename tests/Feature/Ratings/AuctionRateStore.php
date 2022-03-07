<?php

namespace Tests\Feature\Ratings;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuctionRateStore extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function should_rate_rate_auction()
    {
//        $response = $this->post('/api/auctions/'. );
    }

    private function storeAuctionWithProduct()
    {

    }
}
