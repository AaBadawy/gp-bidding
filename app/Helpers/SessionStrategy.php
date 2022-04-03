<?php

namespace App\Helpers;

use App\Entities\Auction;
use Illuminate\Support\Collection;

class SessionStrategy implements WatchStrategy
{

    /**
     * @var \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed
     */
    protected Collection $collection;

    public function __construct()
    {
        if(session()->exists("watching-list"))
            $this->collection = session("watching-list");
        else
            $this->collection = collect();
    }

    public function toggle(Auction $auction): Auction
    {
        if($this->exists($auction))
            return $this->remove($auction);

        return $this->add($auction);
    }

    public function add(Auction $auction): Auction
    {
        if(! $this->exists($auction)) {
            $this->collection->add($auction->id);
            $this->save();
        }

        return $auction;
    }

    public function remove(Auction $auction): Auction
    {
        if($this->exists($auction)) {
            $this->collection = $this->collection->reject(fn($value) => $value == $auction->id);
            $this->save();
        }

        return $auction;
    }

    public function exists(Auction $auction): bool
    {
        return (bool) $this->connect()->filter(fn($value) => $value == $auction->id)->count();
    }

    public function all(int $limit = null): Collection
    {
        $query =  Auction::query()
            ->whereKey($this->connect()->toArray());

        $query = $limit ? $query->limit($limit) : $query;

        return $query->get();
    }

    public function find(Auction $auction): Auction
    {
        return Auction::findOrFail($this->connect()->filter(fn() => $auction->id)->first());
    }

    public function count(): int
    {
        return $this->connect()->count();
    }

    protected function connect():Collection
    {
        return session("watching-list",$this->collection);
    }

    private function save()
    {
        foreach ($this->collection as $item) {
            throw_unless(is_int($item),new \Exception("item should be integer"));
        }

        session()->replace(["watching-list" => $this->collection]);
    }
}
