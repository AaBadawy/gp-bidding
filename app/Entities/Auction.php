<?php

namespace App\Entities;

use Database\Factories\AuctionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Auction.
 * @property int $id
 * @package namespace App\Entities;
 */
class Auction extends Model implements Transformable
{
    use TransformableTrait, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','start_price','biding_type','bidding_price','start_at','end_at','vendor_id','status'];

    protected $dates = ['end_at','start_at'];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    protected static function newFactory()
    {
        return app(AuctionFactory::class)->new();
    }


    public function biddings()
    {
        return $this->hasMany(Bidding::class);
    }

    public function lastBidding()
    {
        return $this->hasOne(Bidding::class)->latestOfMany();
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status',$status);
    }
}
