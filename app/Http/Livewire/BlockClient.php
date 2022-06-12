<?php

namespace App\Http\Livewire;

use App\Entities\Block;
use App\Models\User;
use Livewire\Component;

class BlockClient extends Component
{
    public User $client;

    public string $switchBlock = 'block';

    public function render()
    {
        if(Block::query()->where('blocked_id',$this->client->id)->where('vendor_id',auth()->user()->vendor()->value('id'))->exists())
            $this->switchBlock = 'unblock';
        return view('livewire.block-client');
    }

    public function block()
    {
        $block = Block::query()
            ->firstOrCreate([
//                'blocked_by' => auth()->id(),
                'blocked_id' => $this->client->id,
                'vendor_id'  => auth()->user()->vendor()->value('id'),
            ]);

        if(! $block->wasRecentlyCreated) {
            $block->delete();
            $this->switchBlock = 'unblock';
        }
    }
}
