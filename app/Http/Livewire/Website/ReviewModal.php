<?php

namespace App\Http\Livewire\Website;

use App\Entities\Auction;
use App\Entities\Review;
use Livewire\Component;

class ReviewModal extends Component
{
    public bool $mouseHovered = false;

    public Auction $auction;

    public int $number = 1;

    public string $body = '';

    protected $listeners = ['startIs'];

    protected array $rules = [
        'body'  => ['required','string','max:255'],
        'number'    => ['required','min:1','max:5'],
    ];
    public Review | null $review = null;

    public function mount()
    {
        if(auth()->check() && ! is_null($review = auth()->user()->reviews()->whereBelongsTo($this->auction,'auction')->first())){
            $this->body = $review->body;
            $this->number = $review->stars;
            $this->review =  $review;
        }
    }
    public function render()
    {
        return view('livewire.website.review-modal');
    }

    public function lightStar()
    {
        $this->mouseHovered = true;
    }

    public function muteStar()
    {
        $this->mouseHovered = false;
    }

    public function startIs($number)
    {
        $this->number = $number;
    }

    public function submit()
    {
//        $this->validate();

        Review::query()
            ->updateOrCreate(['auction_id' => $this->auction->id,'reviewer_id' => auth()->id()],[
                'body' => $this->body,
                'stars' => $this->number,
            ]);

        return $this->redirectRoute('website.auction.details',['auction' => $this->auction->id]);
    }
}
