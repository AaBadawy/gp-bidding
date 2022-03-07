<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AuctionRepository;
use App\Entities\Auction;
use App\Validators\AuctionValidator;

/**
 * Class AuctionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AuctionRepositoryEloquent extends BaseRepository implements AuctionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Auction::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
