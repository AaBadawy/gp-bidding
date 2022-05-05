<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class EditAction extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $route,public string $class = "fa fa-eye text-primary mx-1",public string $text = '')
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datatable.edit-action');
    }
}
