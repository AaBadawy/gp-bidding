<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\BlockRepository;
use App\Entities\Block;
use App\Validators\BlockValidator;

/**
 * Class BlockRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class BlockRepositoryEloquent extends BaseRepository implements BlockRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Block::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
