<?php

namespace App\Models;

use App\Entities\Auction;
use App\Entities\Bidding;
use App\Entities\Chat;
use App\Entities\Vendor;
use App\traits\UserType;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 */
class User extends Authenticatable
{
    use HasApiTokens , HasFactory, Notifiable,HasRoles,UserType;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
        'type',
        'vendor_id',
        'is_owner',
        'ml_id',
        'ml_user_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeClientType(Builder $builder)
    {
        return $builder->byType('client');
    }

    public function scopeAdminType(Builder $builder)
    {
        return $builder->byType('admin');
    }

    public function scopeVendorType(Builder $builder)
    {
        return $builder->byType('vendor');
    }

    public function scopeByType(Builder $builder,string $type)
    {
        return $builder->where('type',$type);
    }

    public function myBids()
    {
        return $this->hasMany(Bidding::class,"client_id");
    }

    public function involvedAuctions()
    {
        return $this->belongsToMany(Auction::class,'biddings',"client_id",'auction_id')
            ->withPivot("amount_price");
    }

    public function involvedAuctionsDistinct()
    {
        return $this->belongsToMany(Auction::class,'biddings',"client_id",'auction_id')->select('auctions.*');
    }

    public function wonAuctions()
    {
        return $this->hasMany(Auction::class,"winner_id");
    }

    public function watchList()
    {
        return $this->belongsToMany(Auction::class,"watching","client_id","auction_id");
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'vendor_id');
    }

    public function chatters()
    {
        return $this->belongsToMany(User::class,"chats",'to_id','from_id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class,"from_id");
    }
}
