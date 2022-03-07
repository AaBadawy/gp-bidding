<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CountableComponent extends Component
{
    public $count;
    public $title;
    public $color;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($count,$title,$color = 'white')
    {
        $this->count = $count;
        $this->title = $title;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.countable-component');
    }
}
