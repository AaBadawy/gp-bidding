<?php

namespace App\Entities;

use App\Events\BidCreated;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Biddding.
 * @property int amount_price
 * @property Auction $auction
 * @package namespace App\Entities;
 */
class Bidding extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auction_id',
        'client_id',
        'amount_price',
    ];

    protected static function booted()
    {
        static::created(fn(Bidding $bidding) => event(new BidCreated($bidding->auction)));
    }

    /**
     * relation between auction and bid
     * every single bid belongs to one auction
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    /**
     * relation  between bid and client
     * every single bid belongs to one client
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
