<?php


namespace App\Classes\Interfaices;


use Illuminate\Database\Eloquent\Builder;

interface HasProducts
{
    /**
     * get The Current Products For The Authenticated User Based on His Type
     * @param Builder $query
     * @return Builder
     */
    public function scopeProductsBasedOnAuth(Builder $query):Builder;
}
