<?php

namespace App\Http\Livewire\Website\Profile;

use Livewire\Component;

class MyWatchingList extends Component
{
    protected $listeners = ['auction-toggled' => '$refresh'];

    public function render()
    {
        return view('livewire.website.profile.my-watching-list');
    }
}
