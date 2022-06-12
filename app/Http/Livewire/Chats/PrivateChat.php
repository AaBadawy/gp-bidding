<?php

namespace App\Http\Livewire\Chats;

use App\Entities\Chat;
use App\Events\ChatMessageSent;
use App\Models\User;
use App\Notifications\MessageSentTouser;
use Illuminate\Support\Collection;
use Livewire\Component;

class PrivateChat extends Component
{
    public User|null $chatWith;

    public Collection $chatMessages;

    public string|null $body = '';

    protected $listeners = ['chatWith-changed' => 'setChatWith'];

    protected function getListeners()
    {
        $listeners =  [
            'chatWith-changed' => 'setChatWith',
        ];
            $listeners["echo:chatting.from.{$this->chatWith?->id},ChatMessageSent"] = '$refresh';
            $listeners["echo:chatting.to.{$this->chatWith?->id},ChatMessageSent"] = '$refresh';
        return $listeners;
    }

    public function mount()
    {
        $this->getLastChatter();

        $this->getChatMessages();

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
        $this->chatWith = Chat::query()->whereIn("from_id",[auth()->id(),$this?->chatWith?->id])->whereIn("to_id",[auth()->id(),$this->chatWith?->id])->with(['from','to'])->orderBy("created_at")->first();
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
            $chat = Chat::query()->create([
                'from_id' => auth()->id(),
                'to_id' => $this->chatWith->id,
                'body' => $this->body,
            ]);
            $this->body = '';
            event(new ChatMessageSent($chat));
            $this->chatWith->notify(new MessageSentTouser(auth()->user()));
        }
    }

    public function setChatWith(User $chatWith)
    {
//        dd($chatWith->name);
        $this->chatWith = $chatWith;
//        dd($this->chatWith);
    }
}
