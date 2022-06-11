<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class Notification extends Component
{
    public DatabaseNotification $notification;

    protected $listeners = ['read' => '$refresh'];

    public function render()
    {
        return view('livewire.dashboard.notification');
    }

    public function routeTo()
    {
        if($this->notification->read())
            return ;

        $this->notification->markAsRead();

        $this->emit('read');

        $this->redirect(notification_url($this->notification));
    }
}
