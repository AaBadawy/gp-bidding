<?php

namespace App\Http\Livewire\Website\Profile;

use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateSection extends Component
{
    public string $input;

    public string $value;

    public string $title;

    public string $name;

    public array $validationRules = [];

    public bool $startEditing = false;

    protected function rules()
    {
//        dd($this->validationRules);
        return $this->validationRules;
    }

    public function render()
    {
        return view('livewire.website.profile.update-section');
    }

    public function toggleEdit()
    {
        $this->startEditing = ! $this->startEditing;
    }

    public function save()
    {
        $this->validate();

        auth()->user()->update([$this->name => $this->input]);

        $this->value = $this->input;

        $this->toggleEdit();
    }
}
