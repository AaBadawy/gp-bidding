<?php

namespace App\DataTables;

use App\Entities\VendorRequest;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorRequestDataTable extends DataTable
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
            ->addColumn('approve',function (VendorRequest $model) {
                if($model->vendor()->exists())
                    return ;
                $url = route('dashboard.vendors.create',['request_id' => $model->id,'owner' => $model->toArray()]);
                return "<a href='$url' class='btn btn-outline-success'>Create Vendor</a>";
            })
            ->addColumn('action', 'vendorrequestdatatable.action')->rawColumns(['approve']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param VendorRequest $model
     * @return Builder
     */
    public function query(VendorRequest $model)
    {
        return $model->newQuery()->with(['requester'])->select("vendor_requests.*");
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
            Column::make('requester.name')->title('requester name'),
            Column::make('name'),
            Column::make('email'),
            Column::make('mobile'),
            Column::make('note'),
            Column::make('approve'),
            Column::make('created_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'VendorRequest_' . date('YmdHis');
    }
}
