<?php

namespace App\Repositories\Eloquent;

use App\Infrastructure\Repository\EloquentRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\BiddingRepository;
use App\Entities\Bidding;

/**
 * Class BidddingRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class BiddingRepositoryEloquent extends EloquentRepository implements BiddingRepository
{
    protected $allowedFiltersExact = ['auction_id'];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Bidding::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
