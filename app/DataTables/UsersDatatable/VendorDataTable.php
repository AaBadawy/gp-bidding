<?php

namespace App\DataTables\UsersDatatable;
use App\Http\Livewire\Dashboard\InactivateUser;
use App\Models\User;
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
            ->editColumn('parent.name', function($model){
                $parent = $model->parent  ? $model->parent->name : '';
                return "<span>$parent</span>";
            })
            ->addColumn('actions', function ($model) {
                if(auth()->user()->isAdmin())
                return view('auctions.include.datatable._actions',[
//                    'edit_url' => route("dashboard.users.edit",['user'=> $model->id,'user_type' => 'vendor']),
                    'model' => $model
                ]);
            })
            ->addColumn('activate',function ($model) {
              if(auth()->user()->isAdmin())
                  return Livewire::mount(InactivateUser::class,['user' => $model])->html();
            })
            ->rawColumns(['actions','parent.name','type','created_at','activate']);
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
            ->myEmployees(auth()->user())
            ->vendorType()
            ->with("vendor")
            ->select('users.*');
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
            Column::make('name')->title('employee name'),
            Column::make('vendor.name')->title('vendor name'),
            Column::make('created_at'),
            Column::computed('actions')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
        if(auth()->user()->isAdmin())
            $columns[] = Column::make('activate');
        return $columns;
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
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
