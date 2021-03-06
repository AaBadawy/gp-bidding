<?php

namespace App\Repositories\Eloquent;

use App\Infrastructure\Repository\EloquentRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\ProductRepository;
use App\Entities\Product;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ProductRepositoryEloquent extends EloquentRepository implements ProductRepository
{
    protected $allowedFiltersExact = [
        'product.category_id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
