
<div class="faq-wrapper">
    @if(auth()->check())
        <form class="product-bid-form my-2">
            <input type="text" class="" placeholder="lets start explain" wire:model="title">
            <button type="button" class="custom-button" wire:click="ask">Submit</button>
        </form>
        @if($successMessage)
            <div class="my-3 ml-5">
                <p class="text-success font-weight-bold">{{$successMessage}}</p>
            </div>
        @endif
    @endif
    @foreach($questions as $question)
        <div @class(["faq-item", "open active" => $loop->first])>
            <div class="faq-title">
                <img src="{{asset_website("/css/img/faq.png")}}" alt="css"><span class="title">{{$question->title}}</span><span class="right-icon"></span>
            </div>
            <span class="text-muted font-weight-bold">asked by <span @class(['text-dark'])>{{$question->asker()->value('id') == auth()->id() ? 'You' : $question->asker()->value('name')}}</span></span>
            <div class="faq-content">
                <p>{{$question->answer}}</p>
            </div>
        </div>
    @endforeach
</div>
