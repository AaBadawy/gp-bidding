<?php

namespace App\Entities;

use App\Classes\Interfaices\Entryable;
use App\Classes\Interfaices\HasAuctions;
use App\Classes\Interfaices\HasOrders;
use App\Classes\Interfaices\HasProducts;
use Database\Factories\VendorEmployeeFactory;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class VendorEmployee.
 *
 * @package namespace App\Entities;
 */
class VendorEmployee extends Model implements Transformable,AuthorizableContract, Entryable,HasAuctions,HasProducts,HasOrders
{
    use TransformableTrait,HasFactory,HasRoles,Authorizable;
    const TYPE = 'vendor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['is_owner'];


    protected $guard_name = 'web';

    public function user()
    {
        return $this->morphOne('App\Models\User', 'userable');
    }

    public function login()
    {
        if(request()->wantsJson())
            return abort(401);

        session()->regenerate();
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    protected static function newFactory()
    {
        return VendorEmployeeFactory::new();
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeProductsBasedOnAuth(Builder $query):Builder
    {
        return $query->from('products')->where('vendor_id',auth()->user()->userable->vendor->id);
    }


    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeAuctionsBasedOnAuth(Builder $query):Builder
    {
        return $query->setModel(new Auction())->where('vendor_id',\auth()->user()->userable->vendor->id);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeOrdersBasedOnAuth(Builder $query): Builder
    {
        return $query->setModel(new Order())->whereHas('auction',function ($q){
            return $q->where('vendor_id', '=' , \auth()->user()->userable->vendor->id);
        });
    }
}
