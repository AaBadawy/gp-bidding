<?php

namespace App\Entities;

use App\Models\User;
use Database\Factories\AuctionFactory;
use Illuminate\Database\Eloquent\Builder;
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
    protected $fillable = ['name','description','start_price','biding_type','bidding_price',"current_price",'start_at','end_at','vendor_id','status',"winner_id"];

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

    public function lastBiding()
    {
        return $this->hasOne(Bidding::class)->latestOfMany();
    }

    public function bidders()
    {
        return $this->belongsToMany(User::class,'biddings',"auction_id",'client_id')->distinct();
    }

    public function lastBidding()
    {
        return $this->hasOne(Bidding::class)->latestOfMany();
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function winner()
    {
        return $this->belongsTo(User::class,"winner_id");
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status',$status);
    }

    public function scopeShouldBeAssignToWinner(Builder $builder)
    {
        return $builder
            ->doesntHave("winner")
            ->where("end_at","<=", today()->format("Y-m-d H:i"))
            ->has("lastBidding");
    }
    /**
     * @return bool
     */
    public function isExpired():bool
    {
        return today()->greaterThanOrEqualTo($this->end_at);
    }
}
