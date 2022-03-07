<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\VendorRepository;
use App\Entities\Vendor;

/**
 * Class VendorRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VendorRepositoryEloquent extends BaseRepository implements VendorRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Vendor::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
