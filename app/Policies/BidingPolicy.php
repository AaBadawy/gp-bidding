<?php

namespace App\Policies;

use App\Entities\Auction;
use \App\Entities\Bidding;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BidingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Entities\Bidding  $bid
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Bidding $bid)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Entities\Auction  $auction
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user,Auction $auction)
    {
//        if(today()->greaterThanOrEqualTo($auction->end_at))
//            return Response::deny("This auction is Expired!");

        $condition = true;

        if($user->isVendor())
            $condition = $condition && ($auction->vendor_id != $user->vendor_id);

        return $condition && ($auction->lastBiding()->value("client_id") != $user->id) ? Response::allow()
            : Response::deny('Please Wait until other person bid on this auction');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Entities\Bidding  $bid
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Bidding $bid)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Entities\Bidding  $bid
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Bidding $appEntitiesBiddings)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Entities\Bidding  $bid
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Bidding $bid)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Entities\Bidding  $bid
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Bidding $bid)
    {
        //
    }
}
