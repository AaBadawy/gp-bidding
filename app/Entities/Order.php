<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Order.
 *
 * @package namespace App\Entities;
 */
class Order extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'total_price',
        'client_id',
        'auction_id',
        'status', // pending, in progress, delivered
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
    /**
     * @param $query
     * @return mixed
     */
    public function scopeBasedOnAuth($query)
    {
        return auth()->user()->userable->ordersBasedOnAuth();
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status', $status);
    }
}
