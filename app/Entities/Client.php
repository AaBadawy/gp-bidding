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
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Client.
 *
 * @package namespace App\Entities;
 */
class Client extends Model implements Transformable,AuthorizableContract, Entryable, HasAuctions,HasProducts,HasOrders
{
    use TransformableTrait,HasRoles,Authorizable;

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
        // todo implement create access token
        if(request()->wantsJson()){
            $user = auth()->user();
            $user['token'] = $user->createToken('Laravel Personal Access Client')->accessToken;
            return response()->json([
                'message' => __('messages.login successfully'),
                'data' => $user
            ]);
        }
        session()->reflash();
        return abort(401);
    }

    public function logout()
    {
        if(request()->wantsJson()){
            request()->user()->token()->revoke();
            return response()->json([
                'message' => 'Successfully logged out'
            ]);
        }
        return abort(401);
    }

    public function scopeAuctionsBasedOnAuth(Builder $query): Builder
    {
        $titles = getInterestTitlesByMLUserId(auth()->user()->ml_id);
//        $query = $query->setModel(new Auction())->whereDate('end_at', '>', now());
        $query = $query->setModel(new Auction())->limit(100);
        if($titles)
            $query = $query->whereHas('products', function ($q) use($titles){
                return $q->whereIn('ml_title', $titles);
            });
        return $query->with(['products','vendor']);
    }

    public function scopeProductsBasedOnAuth(Builder $query): Builder
    {
        return $query;
        // TODO: Implement scopeProductsBasedOnAuth() method.
    }

    public function scopeOrdersBasedOnAuth(Builder $query): Builder
    {
        return $query->setModel(new Order())->where('client_id',auth()->user()->userable->id);
    }
}
