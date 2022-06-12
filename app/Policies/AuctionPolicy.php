<?php

namespace App\Policies;

use App\Entities\Auction;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AuctionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user,Auction $auction)
    {
        if($auction->notStarted())
            return $user->hasPermissionTo('delete-auction');

        return $user->hasPermissionTo("delete-auction") && (! $auction->stillRunning() || $auction->biddings()->doesntExist());
    }
}
