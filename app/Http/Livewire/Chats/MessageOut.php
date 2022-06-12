<?php

namespace App\Http\Livewire\Chats;

use App\Entities\Chat;
use Livewire\Component;

class MessageOut extends Component
{
    public Chat $message;
    public function render()
    {
        return view('livewire.chats.message-out');
    }
}
