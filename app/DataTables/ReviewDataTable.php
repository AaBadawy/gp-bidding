<?php

namespace App\DataTables;

use App\Entities\Category;
use App\Entities\Review;
use App\Repositories\Contracts\ReviewRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ReviewDataTable extends DataTable
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
            ->addColumn('action', function($model) {
                if(! auth()->user()->isAdmin())
                    return ;
                return view('auctions.include.datatable._actions',['model' => $model]);
            })
            ->editColumn('auction.name',function ($model) {
                $auction_name = $model->auction->name;
                $url = route('dashboard.auctions.show',['auction' => $model->auction->id]);
                return "<a href='{$url}' class='text-primary' target='_blank'>{$auction_name} <i class='fas fa-link'></i></a>";
            })
            ->editColumn('auctions_count',fn($model) => $model->auctions_count)
            ->rawColumns(['action','auctions_count','auction.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param  Review $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Review $model,ReviewRepository $repository)
    {
        $query = $repository->spatie()->toBase();

        return $model->newQuery()->setQuery($query)->with(['reviewer','auction'])->forUser(auth()->user())->select("reviews.*");
    }

    /**
     * Optional method if you want to use html builder
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('vendor-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("<'row'<'col-3' l><'col-6 text-right' B><'col-3' f>>
                                <'row'<'col-12' tr>>
                                <'row'<'col-5'i><'col-7 dataTables_pager'p>>")
            ->orderBy(1)->drawCallbackWithLivewire();
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
            Column::make("reviewer.name")->title("Reviewer"),
            Column::make('stars')->title("total stars"),
            Column::make('body')->title("Review Body"),
            Column::make("auction.name")->title("Auction"),
            Column::make('action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Category_' . date('YmdHis');
    }
}
