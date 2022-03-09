<?php

namespace App\Entities;

use App\Models\User;
use App\Scopes\OrdersForUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use function PHPUnit\Framework\matches;

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

    public static function booted()
    {
        static::addGlobalScope(new OrdersForUser(auth()->user()));
    }

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
        return auth()->user()->ordersBasedOnAuth();
    }

    public function scopeStatus($query,$status)
    {
        return $query->where('status', $status);
    }

    protected function scopeForUser(Builder $builder,User $user):Builder
    {
        switch ($user->type){
            case 'admin':
                return $this->forAdmin($user);
            case 'vendor':
                return $this->forVendor($user);
            case 'client':
                return $this->forCient($user);
        }
        throw new \Exception('not found user type');
    }

    public function scopeForAdmin(Builder $builder,User $ueer)
    {
        return $builder;
    }

    public function scopeForVendor(Builder $builder,User $user)
    {
        return $builder->where('vendor_id',$user->vendor_id);
    }

    public function scopeForClient(Builder $builder,User $user)
    {
        return $builder->where('client_id',$user->id);
    }
}
