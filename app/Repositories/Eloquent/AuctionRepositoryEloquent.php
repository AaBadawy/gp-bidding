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
    protected $allowedFilters = [
        'name'
    ];

    protected $allowedFiltersExact = [
        'winner_id',
        'vendor_id',
        'category_id'
    ];

    protected $allowedFilterScopes = [
        'actualStatusIs'
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
}
