<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\negotiationRepository;
use App\Entities\Negotiation;
use App\Validators\NegotiationValidator;

/**
 * Class NegotiationRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class NegotiationRepositoryEloquent extends BaseRepository implements NegotiationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Negotiation::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
