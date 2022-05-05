<?php

namespace App\DataTables\UsersDatatable;
use App\Models\User;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorDataTable extends DataTable
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
            ->editColumn('parent.name', function($model){
                $parent = $model->parent  ? $model->parent->name : '';
                return "<span>$parent</span>";
            })
            ->addColumn('actions', function ($model) {
                $btn = "<a href=" . route('dashboard.users.show', ['user' => $model->id,'user_type' => 'vendor']) . " class='fa fa-eye text-primary mx-1'></a>";
                return $btn . "<a href=" . route('dashboard.users.edit', ['user' => $model->id,'user_type' => 'vendor']) . " class='fa fa-edit text-primary mx-1'></a>";
            })
            ->rawColumns(['actions','parent.name','type','created_at']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()
            ->vendorType()
            ->select('users.*');
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
            Column::make('name')->title('employee name'),
            Column::make('vendor.name')->title('vendor name'),
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
        return 'User_' . date('YmdHis');
    }
}
