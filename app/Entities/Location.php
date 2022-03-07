<?php

namespace App\Entities;

use Database\Factories\LocationFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Location.
 *
 * @package namespace App\Entities;
 */
class Location extends Model implements Transformable
{
    use HasFactory,NodeTrait,TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type', 'parent_id'];


    protected static function newFactory()
    {
        return app(LocationFactory::class)->new();
    }
}
