<?php

namespace App\DataTables;

use App\Entities\Bidding;
use App\Models\Bid;
use App\Repositories\Contracts\BiddingRepository;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BidDataTable extends DataTable
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
            ->editColumn('date',fn($model) => "<span>{$model->created_at->toDateString()}</span>")
            ->editColumn('time',fn($model) => "<span>{$model->created_at->toTimeString()}</span>")
            ->addColumn('action', 'bid.action')
            ->rawColumns(['date','time']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Bidding $model
     * @return Builder
     */
    public function query(Bidding $model,BiddingRepository $repository)
    {
        $query = $repository->spatie()->toBase();

        return $model->newQuery()->setQuery($query)->with(["client",'auction'])->select("biddings.*");
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('auction-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1);
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
            Column::make("client.name")->title("client name"),
            Column::make("auction.id")->title("auction id"),
            Column::make("time",'created_at'),
            Column::make("date",'created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Bid_' . date('YmdHis');
    }
}
