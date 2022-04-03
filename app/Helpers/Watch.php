<?php

namespace App\Helpers;

class Watch
{


    /**
     * @var WatchStrategy
     */
    protected WatchStrategy $watchingStrategy;

    public function __construct(?WatchStrategy $strategy = null)
    {
        if(! is_null($strategy))
            $this->watchingStrategy = $strategy;
        else {
            if (auth()->check())
                $this->watchingStrategy = (new DBStrategy(auth()->user()));
            else
                $this->watchingStrategy = (new SessionStrategy());
        }
    }

    public function strategy():WatchStrategy
    {
        return $this->watchingStrategy;
    }
}
