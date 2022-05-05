<?php

namespace App\View\Components\Datatable;

use Illuminate\Support\Arr;
use Illuminate\View\Component;

class Filter extends Component
{
    public string $url;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $key,public $value)
    {

        $this->buildRoute();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.datatable.filter');
    }

    public function buildRoute()
    {
        $old_query = request()->query(); // status=published&category=sport

        $newQuery = Arr::except($old_query, ['filter.'. $this->key]);

        $this->url = route(request()->route()->getName(),$newQuery);
    }
}
