<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\VendorEmployeeRepository;
use App\Entities\VendorEmployee;
use App\Validators\VendorEmployeeValidator;

/**
 * Class VendorEmployeeRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class VendorEmployeeRepositoryEloquent extends BaseRepository implements VendorEmployeeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendorEmployee::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
