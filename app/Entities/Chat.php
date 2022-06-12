<?php

namespace App\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Chat.
 *
 * @package namespace App\Entities;
 */
class Chat extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'body',
        'from_id',
        'to_id',
        'auction_id',
        'sent_at',
        'read_at',
    ];

    protected $dates = ['sent_at','read_at'];

    public function isIn()
    {
        return ! $this->isOut();
    }

    public function isOut()
    {
        return $this->from_id == auth()->id();
    }
    public function from()
    {
        return $this->belongsTo(User::class,"from_id");
    }

    public function to()
    {
        return $this->belongsTo(User::class,"to_id");
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }
}
