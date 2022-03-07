<?php

namespace App\Entities;

use App\Classes\Interfaices\Entryable;
use App\Classes\Interfaices\HasAuctions;
use App\Classes\Interfaices\HasOrders;
use App\Classes\Interfaices\HasProducts;
use App\Models\User;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Support\Facades\Auth;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Admin.
 *
 * @package namespace App\Entities;
 */
class Admin extends Model implements Transformable,AuthorizableContract, Entryable,HasProducts,HasAuctions,HasOrders
{
    use TransformableTrait,HasRoles,Authorizable;

    const TYPE = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    protected $guard_name = 'web';

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function login()
    {
        if(!request()->wantsJson()) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }
        session()->reflash();
        return abort(401);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeProductsBasedOnAuth(Builder $query):Builder
    {
        return  $query->setModel(new Product());
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeAuctionsBasedOnAuth(Builder $query):Builder
    {
        return $query->setModel(new Auction());
    }

    public function scopeOrdersBasedOnAuth(Builder $query): Builder
    {
        return $query->setModel(new Order());
    }
}
