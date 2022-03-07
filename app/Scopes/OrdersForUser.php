<?php

namespace App\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OrdersForUser implements Scope
{

    protected $types = ['admin' => "forAdmin",'vendor' => "forVendor",'client' => "forClient"];

    private User $user;

    public function __construct(User |null $user)
    {
        $this->setUser($user);
    }

    public function apply(Builder $builder, Model $model)
    {
        $this->types[$this->user->type]($this->user);
        // TODO: Implement apply() method.
    }

    public function setUser(User |null $user)
    {
        //avoid not exists user
        if(is_null($user) && ! app()->runningInConsole())
            throw new \Exception("need to fill user instance");
        $this->user = $user;
    }

    public function forClient(Builder $query)
    {
        return $query->where('client_id',$this->user->id);
    }

    public function forAdmin(Builder $query)
    {
        return $query;
    }

    public function forVendor(Builder $query)
    {
        return $query->whereHas('auction',function ($q){
            return $q->where('vendor_id', '=' , $this->user->vendor->id);
        });
    }
}
