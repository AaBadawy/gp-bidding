<?php

namespace App\Repositories\Eloquent;

use App\Infrastructure\Repository\EloquentRepository;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Contracts\QuestionRepository;
use App\Entities\Question;
use App\Validators\QuestionValidator;

/**
 * Class QuestionRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class QuestionRepositoryEloquent extends EloquentRepository implements QuestionRepository
{
    protected $allowedFiltersExact = [
        'auction_id'
    ];

    protected $allowedFilterScopes = [
        'answered'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Question::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
