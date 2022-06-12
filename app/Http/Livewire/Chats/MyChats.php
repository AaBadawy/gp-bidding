<?php

namespace App\Http\Livewire\Chats;

use App\Models\User;
use Livewire\Component;

class MyChats extends Component
{
    public User|null $directTo = null;

    public function render()
    {
        return view('livewire.chats.my-chats');
    }
}
