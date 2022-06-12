<?php

namespace App\Entities;

use App\Models\User;
use Database\Factories\VendorFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Vendor.
 * @method Builder hasProducts()
 * @package namespace App\Entities;
 */
class Vendor extends Model implements Transformable
{
    use TransformableTrait,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','email', 'website','status', 'description'];

    public function employees()
    {
        return $this->hasMany(User::class,'vendor_id');
    }

    public function owner()
    {
        return $this->hasOne(User::class, 'vendor_id')->where('is_owner', 1);
    }

    public function products()
    {
        return $this->hasMany(Product::class,'vendor_id');
    }

    public function auctions()
    {
        return $this->hasMany(Auction::class,'vendor_id');
    }

    public function runningAuctions()
    {
        return $this->auctions()->running();
    }

    public function pastAuctions()
    {
        return $this->auctions()->past();
    }

    public function upcomingAuctions()
    {
        return $this->auctions()->upcoming();
    }

    public function scopeHasProducts(Builder $builder)
    {
        return $builder->has('products');
    }

    protected static function newFactory()
    {
        return VendorFactory::new();
    }

    public function isActive()
    {
        return $this->status == 'active';
    }

    public function blockList()
    {
        return $this->belongsToMany(User::class,'blocks','vendor_id','blocked_id');
    }

    public function request()
    {
        return $this->hasOne(VendorRequest::class,'vendor_id','id');
    }
}
