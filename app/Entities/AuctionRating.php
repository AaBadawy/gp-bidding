<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class AuctionRating.
 *
 * @package namespace App\Entities;
 */
class AuctionRating extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auction_id',
        'product_id',
        'vendor_id',
        'client_id',
        'description',
        'product_title',
        'rating_stars'
    ];

}
