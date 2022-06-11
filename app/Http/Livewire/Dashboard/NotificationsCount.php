<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class NotificationsCount extends Component
{
    protected function getListeners()
    {
        return [
            "echo-private:notification-toggled,NotificationToggledEvent" => '$refresh',
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.notifications-count');
    }
}
