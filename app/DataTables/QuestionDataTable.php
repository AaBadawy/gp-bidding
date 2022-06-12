<?php

namespace App\DataTables;

use App\Entities\Question;
use App\Http\Livewire\Questions\SubmitAnswer;
use App\Repositories\Contracts\QuestionRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Livewire\Livewire;

class QuestionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn("answered_at",function ($model){
                $answered_at = $model->answered_at?->format("Y-m-d H:m");
                return "<span>$answered_at</span>";
            })
            ->editColumn("auction_id",function ($model) {
                $route = route("dashboard.auctions.show",['auction' => $model->auction_id]);
                return "<span class='text-primary'><a href='$route'>$model->id  <i class='fa fa-link'></i></a></span>";
            })
            ->addColumn('submit_answer',function ($model){
                if($model->answered())
                    return ;
                return Livewire::mount(SubmitAnswer::class, ['question' => $model])->html();
            })
            ->addColumn('action', 'question.action')
            ->rawColumns(['answered_at','submit_answer','auction_id']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Question $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Question $model,QuestionRepository $repository)
    {
        $query = $repository->spatie()->toBase();

        return $model->newQuery()->setQuery($query)->select("questions.*");
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('location-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-3' l><'col-6 text-right' B><'col-3' f>>
                                <'row'<'col-12' tr>>
                                <'row'<'col-5'i><'col-7 dataTables_pager'p>>")
            ->orderBy(1)
            ->drawCallbackWithLivewire();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('auction_id')->title('Auction id'),
            Column::make('title')->title("question"),
            Column::make("answer"),
            Column::make("answered_at"),
            Column::computed("submit_answer",'submit answer')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Question_' . date('YmdHis');
    }
}
