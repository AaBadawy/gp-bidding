
<div class="faq-wrapper">
    @if(auth()->check())
        <form class="product-bid-form my-2">
            <input type="text" class="" placeholder="lets start explain" wire:model="title">
            <button type="button" class="custom-button" wire:click="ask">Submit</button>
        </form>
    @endif
    @foreach($questions as $question)
        <div @class(["faq-item", "open active" => $loop->first])>
            <div class="faq-title">
                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">{{$question->title}}</span><span class="right-icon"></span>
            </div>
            <div class="faq-content">
                <p>{{$question->answer}}</p>
            </div>
        </div>
    @endforeach
</div>
