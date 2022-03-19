<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\VendorRequestRepository;
use App\Entities\VendorRequest;
use App\Validators\VendorRequestValidator;

/**
 * Class VendorRequestRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class VendorRequestRepositoryEloquent extends BaseRepository implements VendorRequestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendorRequest::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
