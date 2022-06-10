<?php

namespace App\View\Components;

use App\Entities\Bidding;
use Illuminate\View\Component;
use Yajra\DataTables\Facades\DataTables;

class Datatable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(protected string $datatablePath)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return app($this->datatablePath)->render('components.datatable');
    }
}
