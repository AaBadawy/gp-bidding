<?php

namespace App\View\Components\Website\Profile\Dashboard;

use Illuminate\View\Component;

class ActiveInvolvedAuctions extends StatsComponent
{


    public function totalStats(): int
    {
        return $this->auth->involvedAuctions()
            ->running()
            ->count();
    }

    public function statsFor(): string
    {
        return "Active Auctions";
    }
}
