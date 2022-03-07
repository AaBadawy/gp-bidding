<?php


namespace App\Classes\Interfaices;


use Illuminate\Database\Eloquent\Builder;

interface HasAuctions
{
    /**
     * get The Current Auctions For The Authenticated user based on his type
     * @param Builder $query
     * @return Builder
     */
    public function scopeAuctionsBasedOnAuth(Builder $query):Builder;

}
