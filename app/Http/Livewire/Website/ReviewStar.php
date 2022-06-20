<?php

namespace App\Http\Livewire\Website;

use Livewire\Component;

class ReviewStar extends Component
{
    public bool $mouseHovered = false;

    public int $number;

    protected function getListeners()
    {
        return [
            "light-star" => "lightStar"
        ];
    }

    public function render()
    {
        return view('livewire.website.review-star');
    }


    public function lightStar(int | null $parentNumber = null)
    {
        if(is_null($parentNumber) || $this->number <= $parentNumber)
            $this->mouseHovered = true;
    }

    public function muteStar()
    {
        $this->mouseHovered = false;
    }

    public function startIs()
    {
        $this->emitUp('startIs',$this->number);
    }
}
