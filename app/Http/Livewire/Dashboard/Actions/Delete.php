<?php

namespace App\Http\Livewire\Dashboard\Actions;

use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class Delete extends Component
{
    public Model $model;

    public function render()
    {
        return view('livewire.dashboard.actions.delete');
    }


    public function delete()
    {
        $this->model->delete();

        return redirect()->back();
    }
}
