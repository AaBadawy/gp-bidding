<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Livewire\Component;

class NotificationsPage extends Component
{

    public int $perPage = 15;

    public function render()
    {
        $notifications = $this->getNotifications();

        return view('livewire.dashboard.notifications-page',compact('notifications'));
    }


    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function getNotifications()
    {
        return auth()->user()->notifications()->latest()->paginate($this->perPage);
    }
}
