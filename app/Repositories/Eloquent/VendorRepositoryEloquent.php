<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
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

    /**
     * @param Vendor $vendor
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection|mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function toggleStatus(Vendor $vendor)
    {
        $this->model = $vendor;

        $this->model->status = $this->model->status == 'active' ? 'inactive' : 'active';

        $this->model->save();

        $this->resetModel();

        return $this->parserResult($this->model);
    }
}
