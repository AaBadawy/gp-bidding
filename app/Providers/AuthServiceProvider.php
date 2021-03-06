<?php

namespace App\Providers;

use App\Entities\Auction;
use App\Entities\Bidding;
use App\Entities\Vendor;
use App\Policies\AuctionPolicy;
use App\Policies\BidingPolicy;
use App\Policies\VendorPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
            Vendor::class => VendorPolicy::class,
            Bidding::class => BidingPolicy::class,
            Auction::class => AuctionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
        //
    }
}
