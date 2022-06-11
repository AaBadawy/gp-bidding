<?php

namespace App\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Question.
 *
 * @package namespace App\Entities;
 */
class Question extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['answered_at'];

    protected $with = ['asker'];

    public function scopeAnswered(Builder $builder)
    {
        return $builder->whereNotNull("answer")->whereNotNull("answered_at");
    }

    public function asker()
    {
        return $this->belongsTo(User::class,'asked_by');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }
}
