<?php

namespace App\Listeners;

use App\Helpers\SessionStrategy;
use Illuminate\Auth\Events\Login;

class SyncAllAuctionsFromSession
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if($this->doesntHaveAnyAuctions())
            return ;

        $session_strategy = new SessionStrategy();

        watching()
            ->sync(watching($session_strategy)->all()->pluck("id")->toArray());

        watching(watching($session_strategy))
            ->removeAll();
    }


    private function doesntHaveAnyAuctions():bool
    {
        return ! watching((new SessionStrategy()))->count();
    }
}
