<?php

namespace App\Entities;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Product.
 * @property Auction $auction
 * @method static mixed withoutAuction()
 * @method mixed withVendor($vendor_id)
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable , HasMedia
{
    use TransformableTrait,HasFactory, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'products';
    protected $fillable = ['name','vendor_id','auction_id','description','price','sold', 'ml_id', 'ml_title'];
    public $timestamps = true ;


    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWithoutAuction($query)
    {
        return $query->whereNull('auction_id');
    }

    public function scopeWithVendor($query,$vendor_id)
    {
        return $query->where('vendor_id',$vendor_id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeBasedOnAuth($query)
    {
        return auth()->user()->userable->productsBasedOnAuth();
    }


    protected static function newFactory()
    {
        return app(ProductFactory::class)->new();
    }
}
