<?php

namespace App\View\Components\Website\Profile\Dashboard;

use Illuminate\View\Component;

class NoticableAuctions extends StatsComponent
{


    public function totalStats(): int
    {
        return 0;
    }

    public function statsFor(): string
    {
        return "watching";
    }
}
