<?php

namespace App\Helpers;

use App\Entities\Auction;
use Illuminate\Support\Collection;

interface WatchStrategy
{
    public function toggle(Auction $auction):Auction;

    public function add(Auction $auction):Auction;

    public function remove(Auction $auction):Auction;

    public function removeAll():bool;

    public function exists(Auction $auction):bool;

    public function all(int $limit = null):Collection;

    public function find(Auction $auction):Auction;

    public function count():int;
}
