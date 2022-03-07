<?php

namespace Tests\Feature\Auction;

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\VerifyCsrfToken;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreAuction extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function should_store_when_valid_data()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class, Authenticate::class]);
        $auction_data = [
            'name'=> 'auction details',
            'description' => 'This is last Description',
            'start_price' => 1245,
            'bidding_price' => 124,
            'bidding_type' => 'step',
            'start_at' => now(),
            'end_at' => now(),
            'vendor_id' => 15,
            'status' => 'pending'
        ];
        $response = $this->post(config('antique.dashboard-prefix') . '/auctions', $auction_data);
        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }
}
