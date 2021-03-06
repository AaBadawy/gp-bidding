<?php

namespace App\DataTables;

use App\Entities\Product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('action', function ($model) {
                return view('auctions.include.datatable._actions' ,[
                    'edit_url' => route("dashboard.products.edit",['product' =>$model->id]),
                    'model'     => $model,
                ]);
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Entities\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model)
    {
        return $model->newQuery()->forUser(auth()->user())->with('vendor')->select('products.*');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('product-table')
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
            Column::make('price'),
            Column::make('created_at'),
        ];
        if(auth()->user()->isAdmin())
            $columns[] = Column::make('vendor.name')->title('vendor name');
        $columns[] = Column::computed('action');
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
}
