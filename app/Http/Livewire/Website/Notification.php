<?php

namespace App\Http\Livewire\Website;

use Illuminate\Notifications\DatabaseNotification;
use Livewire\Component;

class Notification extends Component
{

    public DatabaseNotification $notification;

    protected $listeners = ['read' => '$refresh'];

    public function render()
    {
        return view('livewire.website.notification');
    }

    public function read()
    {
        $this->emitSelf('read');
    }

    public function routeTo()
    {
        if(! $this->notification->read()) {
            $this->notification->markAsRead();
        }

        $this->emit('read');

        $this->redirect(notification_url($this->notification,'website.'));
    }
}
