<?php

namespace App\View\Components\Website\Profile\Dashboard;

use Illuminate\View\Component;

class WonAuctions extends StatsComponent
{

    public function totalStats(): int
    {
        return $this->auth->wonAuctions()->count();
    }

    public function statsFor(): string
    {
        return "Auctions Won";
    }
}
