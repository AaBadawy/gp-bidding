<?php

namespace App\DataTables;

use App\Entities\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CategoryDatatable extends DataTable
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
                $data = [
                    'edit_url' => route('dashboard.categories.edit',['category' => $model->id]),
                ];
                if(auth()->user()->can('delete',$model))
                    $data['model'] = $model;
                return view('auctions.include.datatable._actions',$data);
            })
            ->editColumn('auctions_count',fn($model) => $model->auctions_count)
            ->rawColumns(['action','auctions_count']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param  Category $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
    {
        return $model->newQuery()
            ->withCount('auctions');
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
            Column::make('name'),
            Column::make('auctions_count')->title("total auctions"),
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
