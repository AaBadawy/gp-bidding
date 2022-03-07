<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\AucctionProductRepository;
use App\Entities\AucctionProduct;
use App\Validators\AucctionProductValidator;

/**
 * Class AucctionProductRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class AucctionProductRepositoryEloquent extends BaseRepository implements AucctionProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AucctionProduct::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
