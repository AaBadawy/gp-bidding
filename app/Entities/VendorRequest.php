<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class VendorRequest.
 *
 * @package namespace App\Entities;
 */
class VendorRequest extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "requester_id",
        "name",
        "email",
        "mobile",
        "note"
    ];

}
