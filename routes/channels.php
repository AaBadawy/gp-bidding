<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel("auctions.{auctionId}",function ($auctionId) { return \App\Entities\Auction::find($auctionId);});

Broadcast::channel("notification-toggled",function ($user) {
    return true;
});
Broadcast::channel('chatting.from.{from_id}',function ($from_id) {
    return true;
});
Broadcast::channel('chatting.to.{to_id}',function ($to_id) {
    return true;
});
