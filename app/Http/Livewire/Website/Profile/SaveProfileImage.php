<?php

namespace App\Http\Livewire\Website\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;

class SaveProfileImage extends Component
{
    use WithFileUploads;

    public string $image;

    public $newImage;

    public function rules()
    {
        return [
            'newImage' => ['required','image'],
        ];
    }
    public function mount()
    {
        $this->image = auth()->user()->getFirstMediaUrl('profile_image');

        if(empty($this->image))
            $this->image = asset_website("images/dashboard/user.png");
    }

    public function render()
    {
        return view('livewire.website.profile.save-profile-image');
    }

    public function updatedNewImage()
    {
        $this->validate();

        auth()->user()->clearMediaCollection('profile_image');

        auth()->user()->addMedia($this->newImage)->toMediaCollection('profile_image');

        $this->image = auth()->user()->getFirstMediaUrl('profile_image');
    }
}
