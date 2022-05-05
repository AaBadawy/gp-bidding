<?php

namespace App\Repositories\Eloquent;

use App\Infrastructure\Repository\EloquentRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AuctionRepository;
use App\Entities\Auction;

/**
 * Class AuctionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AuctionRepositoryEloquent extends EloquentRepository implements AuctionRepository
{
    protected $allowedFiltersExact = [
        'winner_id',
        'vendor_id',
    ];

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
