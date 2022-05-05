<?php

namespace App\DataTables;

use App\Entities\Location;
use App\View\Components\Datatable\ColumnType;
use Carbon\Carbon;
use Carbon\Traits\Creator;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LocationDataTable extends DataTable
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
            ->editColumn('created_at' ,function ($model) {
                $created_at     = (new Carbon($model->created_at))->format('Y-m-d H:i');
                return "<span>$created_at</span>";
            })
            ->editColumn('type', function ($model){
                $columns = [
                    'country' => 'primary',
                    'city' => 'danger',
                    'region' =>'secondary'];
                return (new ColumnType($columns,$model->type))->render();
            })
            ->editColumn('parent.name', function($model){
                $parent = $model->parent  ? $model->parent->name : '';
                return "<span>$parent</span>";
            })
            ->addColumn('actions', function ($model) {
                return view('auctions.include.datatable._actions', [
                        'edit_url' => route('dashboard.locations.edit',['location' => $model->id]),
                        'show_url' => route('dashboard.locations.show',['location' => $model->id])
                    ]);
            })
            ->rawColumns(['actions','parent.name','type','created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Location $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Location $model)
    {
        return $model->newQuery()->with(['parent'])->select('locations.*');
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
            Column::make('name'),
            Column::computed('parent.name', 'Parent'),
            Column::make('type'),
            Column::make('created_at'),
            Column::computed('actions')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Location_' . date('YmdHis');
    }
}
