<?php

namespace App\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Review.
 *
 * @package namespace App\Entities;
 */
class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reviewer_id',
        'auction_id',
        'stars',
        'body'
    ];


    public function reviewer()
    {
        return $this->belongsTo(User::class,'reviewer_id');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }

    public function scopeForUser(Builder $builder,User $user)
    {
        if($user->isAdmin())
            return $builder;
        return $builder->whereIn("auction_id",Auction::query()->forUser($user)->select("id"));
    }
}
