<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class InactivateUser extends Component
{
    public string $switchActivation = '';

    public Model $user;

    public function mount()
    {
        $this->toggle();
    }
    public function render()
    {
        return view('livewire.dashboard.inactivate-user');
    }

    public function inactivate()
    {
        if($this->user->isActive()) {
            $this->user->update(['status' => 'inactive']);
        }
        else {
            $this->user->update(['status' => 'active']);

        }
        $this->user->refresh();
        $this->toggle();
    }

    public function toggle()
    {
        if($this->user->isActive())
            $this->switchActivation = 'inactivate';
        else
            $this->switchActivation = 'activate';
    }
}
