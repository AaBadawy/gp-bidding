<?php

namespace App\Repositories\Eloquent;

use App\Infrastructure\Repository\EloquentRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ReviewRepository;
use App\Entities\Review;

/**
 * Class ReviewRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ReviewRepositoryEloquent extends EloquentRepository implements ReviewRepository
{
    protected $allowedFiltersExact = [
        'auction_id',
        'reviewer_id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Review::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
