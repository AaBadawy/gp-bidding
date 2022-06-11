<?php

namespace App\Observers;

use App\Events\NotificationToggledEvent;
use Illuminate\Notifications\DatabaseNotification;

class NotificationObserver
{
    public function created(DatabaseNotification $notification)
    {
        event(new NotificationToggledEvent($notification));
    }

    public function updated(DatabaseNotification $notification)
    {
        $notification->wasChanged("read_at") ?? event(new NotificationToggledEvent($notification));
    }
}
