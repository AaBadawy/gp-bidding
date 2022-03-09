<?php

namespace App\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ProductsForUserScope implements Scope
{

    protected $types = ['admin' => "forAdmin",'vendor' => "forVendor",'client' => "forClient"];

    private User $user;

    public function __construct(User |null $user)
    {
        $this->setUser($user);
    }

    public function apply(Builder $builder, Model $model)
    {
        if(app()->runningInConsole())
            return $builder;

        $method = $this->types[$this->user->type];
        return $this->$method($builder);
    }

    public function setUser(User |null $user)
    {
        //avoid not exists user
        if(is_null($user) && ! auth()->check())
            $this->user = (new User(['type' => 'client']));
        else
            $this->user = $user;
    }

    public function forClient(Builder $query)
    {
        return $query->has('auction');
    }

    public function forAdmin(Builder $query)
    {
        return $query;
    }

    public function forVendor(Builder $query)
    {
        return $query->where('vendor_id',$this->user->vendor_id);
    }
}
