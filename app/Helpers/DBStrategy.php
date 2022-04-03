<?php

namespace App\Helpers;

use App\Entities\Auction;
use App\Models\User;
use App\Models\Watching;
use Illuminate\Support\Collection;

class DBStrategy implements WatchStrategy
{

    public function __construct(protected User $auth)
    {

    }

    public function toggle(Auction $auction):Auction
    {
        if ($this->exists($auction))
            return $this->remove($auction);

        return $this->add($auction);
    }

    public function add(Auction $auction):Auction
    {
        if ($this->exists($auction))
            return $auction;
        return $this->connection()->create($this->creatingAttributes($auction->id))->auction;
    }

    public function remove(Auction $auction):Auction
    {
        if ($this->exists($auction))
            $this->connection()->whereBelongsTo($auction)->first()->deleteOrFail();

        return $auction;
    }

    public function all(): Collection
    {
        return $this->connection()
            ->get();
    }

    public function find(Auction $auction): Auction
    {
        return $this->connection()
            ->whereBelongsTo($auction)
            ->first();
    }

    public function count(): int
    {
        return $this
            ->connection()
            ->count();
    }

    protected function connection()
    {
        return Watching::query()
            ->whereBelongsTo($this->auth,"client");
    }

    public function exists(Auction $auction): bool
    {
        return $this->connection()
            ->whereBelongsTo($auction)
            ->exists();
    }

    protected function creatingAttributes(int $auction_id):array
    {
        return [
            "client_id"     => $this->auth->id,
            "auction_id"    => $auction_id,
        ];
    }
}
