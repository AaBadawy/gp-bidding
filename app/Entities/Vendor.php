<?php

namespace App\Entities;

use Database\Factories\VendorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Vendor.
 *
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
    protected $fillable = ['name','email', 'website', 'description'];

    public function employees()
    {
        return $this->hasManyThrough('App\Models\User', 'App\Entities\VendorEmployee','id', 'userable_id')
            ->with('userable')->where('users.userable_type', '=' ,'App\Entities\VendorEmployee');
    }

    public function owner()
    {
        return $this->hasOne('App\Entities\VendorEmployee', 'vendor_id')->where('is_owner', 1)->with('user');
    }

    protected static function newFactory()
    {
        return VendorFactory::new();
    }
}
