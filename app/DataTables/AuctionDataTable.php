<?php

namespace App\DataTables;

use App\Entities\Auction;
use App\Repositories\Contracts\AuctionRepository;
use App\View\Components\Datatable\ColumnType;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AuctionDataTable extends DataTable
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
            ->editColumn('winner.name',fn($model) => "<span>{$model->winner?->name}</span>")
            ->editColumn('start_at',fn($model) => "<span>{$model->start_at->format('Y-m-d H:m')}</span>")
            ->addColumn('previewed_price',fn($model) => "<span>{$model->previewed_price}</span>")
            ->editColumn('end_at',fn($model) => "<span>{$model->end_at->format('Y-m-d H:m')}</span>")
            ->editColumn('created_at',fn($model) => "<span>{$model->created_at->format('Y-m-d H:m')}</span>")
            ->editColumn('status',fn($model) => (new ColumnType(['running' => 'warning', 'not started' =>'info', 'upcoming' => 'primary','ended' => 'secondary'],$model->status()))->render())
            ->addColumn('action', function($model) {
                $data = [
                    'edit_url' => route('dashboard.auctions.edit',['auction' => $model->id]),
                    'show_url' => route('dashboard.auctions.show',['auction' => $model->id]),
                ];
                if(auth()->user()->can('delete',$model))
                    $data['model'] = $model;
                return view('auctions.include.datatable._actions',$data);
            })
            ->rawColumns(['action','status','start_at','end_at','created_at','previewed_price','winner.name']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Entities\Auction $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Auction $model,AuctionRepository $repository)
    {
        $query = $repository->spatie()->toBase();

        return $model->newQuery()->setQuery($query)->with(['winner','vendor'])->forUser(auth()->user())->select('auctions.*');
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
            Column::make('name')->title('Title'),
            Column::make('vendor.name')->title('Vendor'),
            Column::make('winner.name')->title('Winner'),
            Column::make('status'),
            Column::make('start_price'),
            Column::make('start_at'),
            Column::make('end_at'),
            Column::make('previewed_price')->title('current price'),
            Column::computed('action')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Auction_' . date('YmdHis');
    }
}
