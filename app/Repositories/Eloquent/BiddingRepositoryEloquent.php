<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\BiddingRepository;
use App\Entities\Bidding;
use App\Validators\BidddingValidator;

/**
 * Class BidddingRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class BiddingRepositoryEloquent extends BaseRepository implements BiddingRepository
{
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
