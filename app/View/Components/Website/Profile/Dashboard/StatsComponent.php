<?php

namespace App\View\Components\Website\Profile\Dashboard;

use App\Models\User;
use Illuminate\View\Component;

abstract class StatsComponent extends Component
{
    public int $totalStats;
    public string $statsFor;

    protected User $auth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $imagePath)
    {
        $this->auth = auth()->user();

        $this->totalStats   =  $this->totalStats();

        $this->statsFor     =  $this->statsFor();
        //
    }

    abstract public function totalStats():int;

    abstract public function statsFor():string;

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.website.profile.dashboard.stats-component');
    }
}
