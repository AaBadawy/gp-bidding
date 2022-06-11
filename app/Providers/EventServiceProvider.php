<?php

namespace App\Providers;

use App\Entities\Auction;
use App\Entities\AuctionRating;
use App\Entities\Bidding;
use App\Entities\Product;
use App\Events\BidCreated;
use App\Listeners\NotifyRelatedUsersWithNewBidListener;
use App\Listeners\SyncAllAuctionsFromSession;
use App\Models\User;
use App\Observers\AuctionObserver;
use App\Observers\AuctionRatingObserver;
use App\Observers\BidObserver;
use App\Observers\NotificationObserver;
use App\Observers\ProductObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Login::class => [
            SyncAllAuctionsFromSession::class,
        ],
        BidCreated::class => [
            NotifyRelatedUsersWithNewBidListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        AuctionRating::observe(AuctionRatingObserver::class);
        Auction::observe(AuctionObserver::class);
        Bidding::observe(BidObserver::class);
        Product::observe(ProductObserver::class);
        DatabaseNotification::observe(NotificationObserver::class);
    }
}
