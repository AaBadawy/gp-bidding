<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AuctionRatingRepository;
use App\Entities\AuctionRating;
use App\Validators\AuctionRatingValidator;

/**
 * Class AuctionRatingRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AuctionRatingRepositoryEloquent extends BaseRepository implements AuctionRatingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AuctionRating::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
