<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Category.
 *
 * @package namespace App\Entities;
 */
class Category extends Model implements HasMedia
{
    use InteractsWithMedia,HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "parent_id",
    ];

    public function auctions()
    {
        return $this->hasMany(Auction::class,'category_id');
    }
}
