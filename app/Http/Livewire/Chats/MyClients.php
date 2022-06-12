<?php

namespace App\Http\Livewire\Chats;

use App\Entities\Chat;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class MyClients extends Component
{
    public Collection $clients;

    public User|null $directTo = null;

    public function mount()
    {
        if(auth()->user()->chatters()->exists())
            $this->clients = User::query()
                ->whereIn("id",Chat::query()->where("from_id",auth()->id())->select('to_id'))
                ->orWhereIn("id",Chat::query()->where("to_id",auth()->id())->select('from_id'))
                ->limit(10)->select("users.*")->distinct()->get();
        else
            $this->clients = User::query()->limit(10)->where("type",'client')->inRandomOrder()->get();
    }

    public function render()
    {
        return view('livewire.chats.my-clients');
    }

    public function chatWith($chat_with_id)
    {
        $this->emitTo('chats.private-chat','chatWith-changed',User::find($chat_with_id));
    }
}
