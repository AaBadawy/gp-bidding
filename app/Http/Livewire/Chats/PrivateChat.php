<?php

namespace App\Http\Livewire\Chats;

use App\Entities\Chat;
use App\Models\User;
use Illuminate\Support\Collection;
use Livewire\Component;

class PrivateChat extends Component
{
    public User|null $chatWith;

    public Collection $chatMessages;

    public string|null $body = '';

    protected $listeners = ['chatWith-changed' => 'setChatWith'];

    public function mount()
    {

    }

    public function render()
    {
        $this->getLastChatter();

        $this->getChatMessages();

        return view('livewire.chats.private-chat');
    }

    public function getLastChatter()
    {
        if($this->chatWith instanceof User)
            return $this->chatWith;
        $this->chatWith = auth()->user()->chatters()->orderByPivot("created_at","desc")->limit(1)->first();
    }

    public function getChatMessages()
    {
        if(is_null($this->chatWith))
            $this->chatMessages = collect();
        $this->chatMessages = Chat::query()->whereIn("from_id",[auth()->id(),$this?->chatWith?->id])->whereIn("to_id",[auth()->id(),$this->chatWith?->id])->with(['from','to'])->orderBy("created_at")->get();
    }

    public function send()
    {
        if(! empty($this->body)) {
            Chat::query()->create([
                'from_id' => auth()->id(),
                'to_id' => $this->chatWith->id,
                'body' => $this->body,
            ]);
            $this->body = '';
        }
    }

    public function setChatWith(User $chatWith)
    {
//        dd($chatWith->name);
        $this->chatWith = $chatWith;
//        dd($this->chatWith);
    }
}
