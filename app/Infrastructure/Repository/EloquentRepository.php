<?php

namespace App\Infrastructure\Repository;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Contracts\Container\Container as Application;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

abstract class EloquentRepository extends BaseRepository
{
    /**
     * Allowed Relations To Be Included.
     *
     * @var array
     */
    protected $allowedIncludes = [];

    /**
     * Allowed Filters
     *
     * @var array
     */
    protected $allowedFilters = [];

    /**
     * Allowed Exact Filters
     *
     * @var array
     */
    protected $allowedFiltersExact = [];

    /**
     * Allowed Exact Filters
     *
     * @var array
     */
    protected $allowedRelationSort = [];

    /**
     * Allowed scope Filters
     * @var array
     */
    protected $allowedFilterScopes = [];


    /**
     * Allowed Fields.
     *
     * @var array
     */
    protected $allowedFields = [];

    /**
     * Allowed Appends.
     *
     * @var array
     */
    protected $allowedAppends = [];

    /**
     * Allowed Sorts.
     *
     * @var array
     */
    protected $allowedSorts = [];

    protected $allowedDefaultSorts = [];

    public function getAllowedIncludes():array
    {
        return $this->allowedIncludes;
    }

    /**
     * @param array|null $params
     * @return EloquentRepository
     * @throws BindingResolutionException
     */
    public function spatie(?array $params = null)
    {
        foreach ($this->allowedFiltersExact as $field) {
            $this->allowedFilters[] = AllowedFilter::exact($field);
        }
        foreach ($this->allowedFilterScopes as $scope_filter) {
            $this->allowedFilters[] = AllowedFilter::scope($scope_filter);
        }
        if ($this->model instanceof Builder) {
            $this->model = $this->initiateSpatieQueryBuilder($this->model,$params)->allowedFields($this->allowedFields)
                ->allowedFilters($this->allowedFilters)->allowedIncludes($this->allowedIncludes)
                ->allowedSorts($this->allowedSorts);

        } else {
            $query = app()->make($this->model())->newQuery();
            $this->model = $this->initiateSpatieQueryBuilder($query,$params)->allowedFields($this->allowedFields)->allowedFilters($this->allowedFilters)
                ->allowedIncludes($this->allowedIncludes)->allowedSorts($this->allowedSorts);

        }
        if(! empty($this->allowedDefaultSorts))
            $this->model = $this->model->defaultSorts($this->allowedDefaultSorts);
        return $this;
    }


    /**
     * @param EloquentBuilder|Relation|string $subject
     * @param array | null $query_params
     * @return QueryBuilder
     */
    private function initiateSpatieQueryBuilder($subject,?array $query_params = null): QueryBuilder
    {
        if(! is_null($query_params))
            return QueryBuilder::for($subject,new Request($query_params));
        return QueryBuilder::for($subject);
    }
}
