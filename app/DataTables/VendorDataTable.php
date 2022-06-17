<?php

namespace App\DataTables;

use App\Entities\Vendor;
use App\Http\Livewire\Dashboard\InactivateUser;
use Carbon\Carbon;
use Livewire\Livewire;
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
            ->addColumn('actions', function ($model) {
                return view('auctions.include.datatable._actions',[
                    'show_url'  => route('dashboard.vendors.show',['vendor' => $model->id]),
                    'model'     => $model,
                ]);
            })
            ->addColumn('activate',function ($model) {
                if(auth()->user()->isAdmin())
                    return Livewire::mount(InactivateUser::class,['user' => $model])->html();
            })
            ->rawColumns(['actions', 'created_at','activate']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Vendor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Vendor $model)
    {
        return $model->newQuery()->select('vendors.*');
    }

    /**
     * Optional method if you want to use html builder.
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
        $columns =  [
            Column::make('id'),
            Column::make('name'),
            Column::make('created_at'),
            Column::computed('actions'),
        ];
        if(auth()->user()->isAdmin())
            $columns[] = Column::make('activate');
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Vendor_' . date('YmdHis');
    }
}
