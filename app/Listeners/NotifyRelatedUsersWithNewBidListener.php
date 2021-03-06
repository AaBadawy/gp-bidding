<?php

namespace App\Listeners;

use App\Events\BidCreated;
use App\Models\User;
use App\Notifications\AuctionHasNewBidNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyRelatedUsersWithNewBidListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  BidCreated  $event
     * @return void
     */
    public function handle(BidCreated $event)
    {
        $event->auction->vendor->employees()
            ->union($event->auction->involvedBiders()->select("users.*"))
            ->get()->each(fn(User $employee) => $employee->notify(new AuctionHasNewBidNotification($event->auction)));
//        $event->auction->involvedBiders()->each(fn(User $client) => $client->notify(new AuctionHasNewBidNotification($event->auction)));
    }
}
